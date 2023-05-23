<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     /*   Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->unsignedSmallInteger('year');
            $table->string('description');
            $table->timestamps();
        });*/
       /* Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idUsuarios');
            $table->strings('nombre',255);
            $table->integer('edad');
            $table->timestamps();
            //
        });
        Schema::create('catStatus', function (Blueprint $table) {
            $table->increments('idStatus');
            $table->strings('status',255);
            $table->integer('active');
            $table->timestamps();
            //
        });*/
        Schema::create('TableUsuarios', function (Blueprint $table) {
            $table->increments('idUsuarios');
            $table->string('idStatus');
            $table->string('strNombre',100);
            $table->string('strApellidoPaterno',100);
            $table->string('strApellidoMaterno',100);
            $table->string('strLogin',100);
            $table->string('strPassword',30);
            $table->timestamps();
        });
    
        Schema::create('TablecatStatus', function (Blueprint $table) {
            $table->increments('idStatus');
            $table->string('strStatus',30);
            $table->boolean('bolVigente');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TableUsuarios', function (Blueprint $table) {
            Schema::dropIfExists('TableUsuarios');
            //
        });
        Schema::table('TablecatStatus', function (Blueprint $table) {
            Schema::dropIfExists('TablecatStatus');
            //
        });
  
    }
}
