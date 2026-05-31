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
        Schema::create('claim', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('found_report_id')->constrained('found_report')->onDelete('cascade');
            $table->text('proof_description');
            $table->string('status')->default('pending'); // e.g., pending, approved, rejected
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('image')->nullable();
            $table->timestamp('date_claimed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim');
    }
};
