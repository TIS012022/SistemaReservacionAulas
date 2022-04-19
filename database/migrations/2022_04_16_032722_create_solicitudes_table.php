<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            
            $table->integer('cantidad');
            $table->text('motivo');
            $table->time('hora_ini');
            $table->time('hora_fin');
            $table->text('periodo');
            $table->date('dia');

            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('aula_id');
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('aula_id')->references('id')->on('aulas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('docente_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('solicitudes');
    }
}
