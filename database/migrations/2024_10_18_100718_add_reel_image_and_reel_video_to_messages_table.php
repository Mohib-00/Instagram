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
        Schema::table('messages', function (Blueprint $table) {
            $table->string('reel_image')->nullable()->after('image');
            $table->string('reel_video')->nullable()->after('video');
        });
    }
    
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('reel_image');
            $table->dropColumn('reel_video');
        });
    }
    
};
