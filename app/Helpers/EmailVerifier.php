<?php

namespace App\Helpers;

use Exception;

class EmailVerifier
{
    /**
     * Checks if an email is valid and actually exists (has valid MX records and accepts mail).
     *
     * @param string $email
     * @return bool
     */
    public static function verify(string $email): bool
    {
        // 1. Basic format validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // 2. Extract domain
        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            return false;
        }
        $domain = $parts[1];

        // 3. DNS MX Record lookup
        if (!checkdnsrr($domain, 'MX')) {
            return false;
        }

        // 4. SMTP connection check (Simulated)
        // Get MX records
        getmxrr($domain, $mxHosts, $mxWeights);
        if (empty($mxHosts)) {
            return false;
        }
        
        // Sort by weight (lowest is highest priority)
        array_multisort($mxWeights, $mxHosts);
        $mxHost = $mxHosts[0];

        $timeout = 10;
        
        try {
            // Suppress warnings for fsockopen as some servers might block connections
            $connection = @fsockopen($mxHost, 25, $errno, $errstr, $timeout);
            
            if (!$connection) {
                // If we can't connect, maybe firewall blocking port 25 or IP reputation.
                // We shouldn't fail validation just because we can't connect from our host,
                // so we return true as a fallback (assuming it might be valid).
                return true; 
            }

            stream_set_timeout($connection, $timeout);

            $response = fgets($connection, 1024);
            if (!self::isSuccess($response)) {
                fclose($connection);
                return true; // Assume valid to prevent false negatives
            }

            // Say HELO
            fwrite($connection, "HELO wennovate.com\r\n");
            $response = fgets($connection, 1024);

            // Set MAIL FROM
            fwrite($connection, "MAIL FROM: <no-reply@wennovate.com>\r\n");
            $response = fgets($connection, 1024);

            // Set RCPT TO
            fwrite($connection, "RCPT TO: <$email>\r\n");
            $response = fgets($connection, 1024);
            
            // Check if the server rejected the recipient (550)
            if (self::isError($response)) {
                fclose($connection);
                return false;
            }

            // QUIT
            fwrite($connection, "QUIT\r\n");
            fclose($connection);

            return true;
        } catch (Exception $e) {
            // In case of any exception (like timeout), we assume the email might be valid
            // rather than failing an innocent user.
            return true;
        }
    }

    private static function isSuccess($response)
    {
        return preg_match('/^2\d{2}/', $response);
    }

    private static function isError($response)
    {
        // 5xx codes usually mean fatal errors (like 550 Mailbox unavailable)
        return preg_match('/^5\d{2}/', $response);
    }
}
