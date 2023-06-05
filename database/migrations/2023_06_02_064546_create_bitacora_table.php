<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TableBitacoraUsuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuarioResponsable');
            $table->string('accion');
            $table->integer('idUsuarios')->nullable();
            $table->string('idStatus')->nullable();
            $table->string('strNombre')->nullable();
            $table->string('strApellidoPaterno')->nullable();
            $table->string('strApellidoMaterno')->nullable();
            $table->string('strLogin')->nullable();
            $table->string('strPassword')->nullable();
            $table->timestamps();
        });
        Schema::create('TableBitacoraLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accion');
            $table->integer('idUsuarios')->nullable();
            $table->timestamps();
        });
    
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TableBitacoraUsuarios');
        Schema::dropIfExists('TableBitacoraLogs');
    }
}
