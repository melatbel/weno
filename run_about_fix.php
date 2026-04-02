<?php
$what_file = 'resources/views/pages/what-to-expect.blade.php';
$about_file = 'resources/views/pages/about.blade.php';

$what_content = file_get_contents($what_file);
$about_content = file_get_contents($about_file);

// 1. EXTRACT <head>...</head> FROM what-to-expect
preg_match('/<head>.*?<\/head>/s', $what_content, $head_matches);
$head = $head_matches[0];
// Ensure correct title
$head = str_replace('<title>
        What to Expect | Wennovate Africa
    </title>', '<title>About | Wennovate Africa</title>', $head);
$head = preg_replace('/<title>.*?<\/title>/s', '<title>About | Wennovate Africa</title>', $head);

// 2. EXTRACT <header id="topnav" ... </header> FROM what-to-expect
preg_match('/<header id="topnav".*?<\/header>/s', $what_content, $header_matches);
$header = $header_matches[0];
// Set About as active
$header = str_replace('class="nav-link active">What to Expect', 'class="nav-link">What to Expect', $header);
$header = str_replace('class="nav-link">About', 'class="nav-link active">About', $header);

// 3. EXTRACT <footer> ... </footer> FROM what-to-expect
preg_match('/<footer class="footer">.*?<\/footer>/s', $what_content, $footer_matches);
$footer = $footer_matches[0];

// 4. EXTRACT MOBILE MENU SCRIPT FROM what-to-expect
// The mobile menu script is between <script> and </script> right after the header. Let's grab it by specific comment.
preg_match('/<script>\s*\/\*\*\s*\*\s*--------------------------------------------------------------------\s*\*\s*MOBILE INTERFACE CONTROLLER.*?<\/script>/s', $what_content, $script_matches);
$script = $script_matches[0] ?? '';

// 5. EXTRACT content between header and footer from the CURRENT about.blade.php
// We know about.blade.php currently has <div class="container pb-5 pt-5 mt-5"> ... </div>
// Let's just hardcode the text content since it's simple to avoid bad regex matches on a dirty file
$body_content = '
    <div class="container pb-5 pt-5 mt-5">
        <div class="about-content p-5 mt-5 text-center" style="border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.08); background: #ffffff;">
            <p class="lead" style="max-width: 850px; margin: 0 auto; color: #444; font-size: 1.25rem; line-height: 1.8;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p class="lead mt-4" style="max-width: 850px; margin: 0 auto; color: #444; font-size: 1.25rem; line-height: 1.8;">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, 
                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
            </p>
        </div>
    </div>
';

// 6. ASSEMBLE NEW about.blade.php
$new_about = "<!DOCTYPE html>\n<html lang=\"en\">\n" . $head . "\n<body>\n\n" . $header . "\n\n" . $script . "\n\n" . $body_content . "\n\n" . $footer . "\n\n    @include('partials.cookie-banner')\n</body>\n</html>\n";

file_put_contents($about_file, $new_about);
echo "Done replacing about.blade.php with exactly the what-to-expect navbar and footer.\n";
