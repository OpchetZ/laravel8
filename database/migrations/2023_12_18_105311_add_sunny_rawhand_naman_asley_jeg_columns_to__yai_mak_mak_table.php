<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSunnyRawhandNamanAsleyJegColumnsToYaiMakMakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('YaiMakMak', function (Blueprint $table) {
            $table->integer('sunny')->nullable();         
            $table->float('rawhand',16,2)->nullable();     
            $table->string('naman')->nullable();          
            $table->date('asley')->nullable();         
            $table->text('jeg')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('YaiMakMak', function (Blueprint $table) {
            //
        });
    }
}
