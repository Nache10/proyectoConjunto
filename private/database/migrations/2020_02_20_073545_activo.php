<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Activo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('activo', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id');
            $table->date('fechainicial');
            $table->date('fechafinal');
            $table->time('horainicial');
            $table->time('horafinal');
            $table->string('periodominimo');
            $table->string('comentario');
            

            $table->rememberToken();
            $table->timestamps();
        });
        
        //activo: id, fechainicial, fechafinal, horainicial, horafinal, periodominimo
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
