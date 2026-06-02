<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('claim', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
    //         $table->foreignId('item_id')->constrained('item')->onDelete('cascade');
    //         $table->text('proof_description');
    //         $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    //         $table->string('image')->nullable();
    //         $table->text('admin_feedback')->nullable();
    //         $table->timestamp('date_claimed');
    //         $table->timestamps();
    //     });
    // }
    public function up(): void
{
    Schema::create('claim', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
        $table->foreignId('item_id')->constrained('item')->onDelete('cascade');
        $table->text('proof_description');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        
        // ADD THESE TWO MISSING COLUMNS:
        $table->string('contact_email');
        $table->string('contact_number');
        
        $table->string('image')->nullable();
        
        // FIX THIS: Make it nullable or use current timestamp as default
        $table->timestamp('date_claimed')->nullable(); 
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
