const fs = require('fs');
const path = require('path');
const dir = path.resolve('resources/views/pages');
const files = fs.readdirSync(dir).filter(f => f.endsWith('.blade.php') && f !== 'welcome.blade.php' && f !== 'dashboard.blade.php' && f !== 'login.blade.php' && f !== 'payment-success.blade.php');

files.forEach(f => {
    const targetFile = path.join(dir, f);
    let original = fs.readFileSync(targetFile, 'utf8');
    let content = original;
    
    // 1. replace header#topnav background to #ffffff
    content = content.replace(/header#topnav\s*\{([^{}]*?)background:\s*(var\(--nav-bg\)|#[a-fA-F0-9]+|transparent|linear-gradient[^;]*);([^{}]*?)\}/g, 
        'header#topnav {$1background: #ffffff;$3}');
        
    // 2. replace .navigation-menu li a color
    content = content.replace(/\.navigation-menu\s*li\s*a\s*\{([^}]*?)color:\s*(#fff|#ffffff);([^}]*?)\}/g, 
        '.navigation-menu li a {$1color: #000000;$3}');

    content = content.replace(/\.navigation-menu\s*li\s*a\s*\{([^}]*?)font-weight:\s*600;([^}]*?)\}/g, 
        '.navigation-menu li a {$1font-weight: 800;$2}');

    // 3. Hamburger on mobile (.h-line) is normally white, make it black:
    content = content.replace(/\.h-line\s*\{([^}]*?)background:\s*#fff;([^}]*?)\}/g, 
        '.h-line {$1background: #000000;$2}');
    
    // 4. Mobile hamburger wrapper has white border / bg initially
    content = content.replace(/\.hamburger\s*\{([^}]*?)background:\s*rgba\(255,\s*255,\s*255,\s*0\.05\);([^}]*?)\}/g, 
        '.hamburger {$1background: rgba(0, 0, 0, 0.05);$2}');
    content = content.replace(/\.hamburger\s*\{([^}]*?)border:\s*1px\s+solid\s+rgba\(255,255,255,0\.1\);([^}]*?)\}/g, 
        '.hamburger {$1border: 1px solid rgba(0,0,0,0.1);$2}');

    if (content !== original) {
        fs.writeFileSync(targetFile, content);
        console.log("Updated " + f);
    }
});
