<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

if(!Schema::hasTable('notifications')) {
    Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->string('type');        // sponsor | partner | feedback
        $table->string('action');      // added | edited | deleted | applied | submitted
        $table->string('message');     // human-readable label
        $table->boolean('is_read')->default(false);
        $table->timestamps();
    });
    echo "Created notifications table.\n";
} else {
    echo "notifications table already exists.\n";
}
