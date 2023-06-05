<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TableLogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action');
            $table->integer('pkt_num');
            $table->integer('gid');
            $table->integer('sid');
            $table->integer('rev');
            $table->string('msg');
            $table->string('service');
            $table->string('src_addr');
            $table->integer('src_port');
            $table->string('dst_addr');
            $table->integer('dst_port');
            $table->text('solucion')->nullable();
            $table->string('falso_positivo')->default('no');
            $table->boolean('incidencia')->default(false);
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
        Schema::dropIfExists('TableLogs');
    }
}
