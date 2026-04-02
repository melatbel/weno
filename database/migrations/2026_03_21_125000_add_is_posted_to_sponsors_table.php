<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasColumn('sponsors', 'is_posted')) {
            Schema::table('sponsors', function (Blueprint $table) {
                $table->boolean('is_posted')->default(false);
            });
        }
    }
    public function down(): void {
        if (Schema::hasColumn('sponsors', 'is_posted')) {
            Schema::table('sponsors', function (Blueprint $table) {
                $table->dropColumn('is_posted');
            });
        }
    }
};
