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
        if (Schema::hasTable('return') && !Schema::hasTable('returns')) {
            Schema::rename('return', 'returns');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('returns') && !Schema::hasTable('return')) {
            Schema::rename('returns', 'return');
        }
    }
};
