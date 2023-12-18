<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYaiMakMakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('YaiMakMak', function (Blueprint $table) {
            $table->date('sunny')->nullable();
            $table->string('asley')->nullable();
            $table->integer('rawhand')->nullable();
            $table->float('jeg')->nullable();
            $table->text('naman')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('YaiMakMak');
    }
}
