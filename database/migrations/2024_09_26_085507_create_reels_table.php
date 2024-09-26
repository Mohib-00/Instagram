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
        Schema::create('reels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->string('image_path')->nullable();   
            $table->string('video_path')->nullable(); 
            $table->text('caption')->nullable();  
            $table->boolean('hide_like')->default(0); 
            $table->boolean('hide_comments')->default(0);  
            $table->unsignedBigInteger('likes')->default(0);   
            $table->unsignedBigInteger('comments')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reels');
    }
};
