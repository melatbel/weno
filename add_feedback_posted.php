<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

if(!Schema::hasColumn('wp_wennovate_feedback', 'is_posted')) {
    Schema::table('wp_wennovate_feedback', function (Blueprint $table) {
        $table->boolean('is_posted')->default(0);
    });
    echo "Added is_posted to feedback.\n";
} else {
    echo "Already has is_posted.\n";
}
