<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

if(!Schema::hasColumn('sponsors', 'source')) {
    Schema::table('sponsors', function (Blueprint $table) {
        $table->string('source')->default('public'); // 'public' or 'admin'
    });
    echo "Added source to sponsors.\n";
} else {
    echo "sponsors already has source.\n";
}

if(!Schema::hasColumn('partners', 'source')) {
    Schema::table('partners', function (Blueprint $table) {
        $table->string('source')->default('public');
    });
    echo "Added source to partners.\n";
} else {
    echo "partners already has source.\n";
}
