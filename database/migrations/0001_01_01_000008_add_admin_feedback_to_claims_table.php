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
        Schema::table('claim', function (Blueprint $table) {
            if (!Schema::hasColumn('claim', 'admin_feedback')) {
                $table->text('admin_feedback')->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('claim', function (Blueprint $table) {
            if (Schema::hasColumn('claim', 'admin_feedback')) {
                $table->dropColumn('admin_feedback');
            }
        });
    }
};
