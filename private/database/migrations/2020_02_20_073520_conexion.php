<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Conexion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('conexion', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id');
            $table->bigInteger('idpuntoacceso')->unsigned();
            $table->date('fecha');
            $table->string('hora');
            $table->string('mac');
            
            $table->foreign('idpuntoacceso')->references('id')->on('puntoacceso');

            
            $table->rememberToken();
            $table->timestamps();
        });

        //conexión: id, idpuntoacceso, fecha, hora, mac

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
