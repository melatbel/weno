const fs = require('fs');
const path = require('path');

const viewsDir = path.resolve('resources/views');
const pagesDir = path.join(viewsDir, 'pages');

const filesToUpdate = [];
if (fs.existsSync(path.join(viewsDir, 'welcome.blade.php'))) {
    filesToUpdate.push(path.join(viewsDir, 'welcome.blade.php'));
}

const pagesFiles = fs.readdirSync(pagesDir).filter(f => f.endsWith('.blade.php') && f !== 'dashboard.blade.php' && f !== 'login.blade.php' && f !== 'payment-success.blade.php');
pagesFiles.forEach(f => filesToUpdate.push(path.join(pagesDir, f)));

filesToUpdate.forEach(targetFile => {
    let original = fs.readFileSync(targetFile, 'utf8');
    let content = original;
    
    // 1. the footer backgrond color:
    content = content.replace(/\.footer\s*\{\s*background:\s*linear-gradient\([^)]+\);/g, 
        '.footer {\n            background: #050510;');

    // 2. footer headers and logo gradient text:
    content = content.replace(/background:\s*linear-gradient\([^)]+\);\s*-webkit-background-clip:\s*text;/g, 
        'background: linear-gradient(90deg, #a855f7, #fbbf24); -webkit-background-clip: text;');

    if (content !== original) {
        fs.writeFileSync(targetFile, content);
        console.log("Updated footer in " + path.basename(targetFile));
    }
});
