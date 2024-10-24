<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();  
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('message')->nullable();
            $table->integer('uniquetimestamp')->nullable();
            $table->string('updatedtimestamp')->nullable(); 
            $table->string('image')->nullable();   
            $table->string('video')->nullable(); 
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
