<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_docente')->nullable();
            $table->text('materia')->nullable();
            $table->text('grupo')->nullable();
            $table->text('aula')->nullable();
            $table->integer('cantidad')->nullable();
            $table->text('motivo')->nullable();
            $table->date('hora_ini')->nullable();
            $table->date('hora_fin')->nullable();
            $table->text('periodo')->nullable();
            $table->date('dia')->nullable();
        
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
        Schema::dropIfExists('reservas');
    }
}
