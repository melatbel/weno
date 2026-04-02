const fs = require('fs');
const path = require('path');

const viewsDir = path.resolve('resources/views');
const pagesDir = path.join(viewsDir, 'pages');

const filesToUpdate = [];
const welcomePath = path.join(viewsDir, 'welcome.blade.php');
if (fs.existsSync(welcomePath)) filesToUpdate.push(welcomePath);

fs.readdirSync(pagesDir)
  .filter(f => f.endsWith('.blade.php') && f !== 'dashboard.blade.php' && f !== 'login.blade.php' && f !== 'payment-success.blade.php')
  .forEach(f => filesToUpdate.push(path.join(pagesDir, f)));

filesToUpdate.forEach(targetFile => {
    let original = fs.readFileSync(targetFile, 'utf8');
    let content = original;

    // Change hover color from #3B82F6 to #fff for .foot-links and .foot-contact links
    // .foot-links li a:hover
    content = content.replace(
        /\.foot-links\s*li\s*a:hover\s*\{([^}]*?)color:\s*#3B82F6;([^}]*?)\}/g,
        '.foot-links li a:hover {$1color: #ffffff;$2}'
    );
    // .foot-contact li a:hover
    content = content.replace(
        /\.foot-contact\s*li\s*a:hover\s*\{([^}]*?)color:\s*#3B82F6;([^}]*?)\}/g,
        '.foot-contact li a:hover {$1color: #ffffff;$2}'
    );

    if (content !== original) {
        fs.writeFileSync(targetFile, content);
        console.log('Updated hover color in ' + path.basename(targetFile));
    }
});
