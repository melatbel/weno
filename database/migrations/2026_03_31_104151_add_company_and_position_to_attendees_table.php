<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('attendees', function (Blueprint $table) {
            if (!Schema::hasColumn('attendees', 'company_name')) {
                $table->string('company_name')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('attendees', 'position')) {
                $table->string('position')->nullable()->after('company_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendees', function (Blueprint $table) {
            $table->dropColumn(['company_name', 'position']);
        });
    }
};
