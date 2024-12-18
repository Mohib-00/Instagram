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
        Schema::table('follows', function (Blueprint $table) {
            $table->boolean('confirm_status')->default(0);  

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('follows', function (Blueprint $table) {
            $table->dropColumn('confirm_status'); 

        });
    }
};

/*
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up()
    {
        Schema::table('follows', function (Blueprint $table) {
            $table->unsignedTinyInteger('confirm_status')->default(0);  
        });
    }

    public function down()
    {
        Schema::table('follows', function (Blueprint $table) {
            $table->dropColumn('confirm_status'); 
        });
    }
};*/
