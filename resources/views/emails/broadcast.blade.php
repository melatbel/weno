<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { margin: 0; padding: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; color: #1e293b; }
        .email-wrapper { width: 100%; table-layout: fixed; background-color: #f8fafc; padding: 20px 0; }
        .email-content { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .img-container { width: 100%; display: block; }
        .img-fluid { width: 100%; max-width: 600px; height: auto; display: block; border: 0; }
        .body-text { padding: 40px; font-size: 16px; line-height: 1.6; color: #334155; white-space: pre-wrap; word-wrap: break-word; }
        .footer-note { text-align: center; font-size: 12px; color: #94a3b8; padding: 20px; }
    </style>
</head>
<body>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    @if($headerImgPath && file_exists($headerImgPath))
                    <tr>
                        <td class="img-container">
                            <img src="{{ $message->embed($headerImgPath) }}" alt="Header Image" class="img-fluid">
                        </td>
                    </tr>
                    @endif
                    
                    <tr>
                        <td class="body-text">
                            {!! $bodyText !!}
                        </td>
                    </tr>

                    @if($footerImgPath && file_exists($footerImgPath))
                    <tr>
                        <td class="img-container">
                            <img src="{{ $message->embed($footerImgPath) }}" alt="Footer Image" class="img-fluid">
                        </td>
                    </tr>
                    @endif
                </table>
                <div class="footer-note">
                    &copy; {{ date('Y') }} Wennovate Africa Summit. All Rights Reserved.
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
