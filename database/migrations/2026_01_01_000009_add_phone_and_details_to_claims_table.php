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
            if (!Schema::hasColumn('claim', 'phone_number')) {
                $table->string('phone_number')->nullable()->after('contact_number');
            }
            if (!Schema::hasColumn('claim', 'additional_details')) {
                $table->text('additional_details')->nullable()->after('phone_number');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('claim', function (Blueprint $table) {
            if (Schema::hasColumn('claim', 'phone_number')) {
                $table->dropColumn('phone_number');
            }
            if (Schema::hasColumn('claim', 'additional_details')) {
                $table->dropColumn('additional_details');
            }
        });
    }
};
