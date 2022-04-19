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

            $table->unsignedBigInteger('grupo');
            $table->unsignedBigInteger('aula');
            $table->unsignedBigInteger('materia');
            $table->unsignedBigInteger('docente');
            $table->foreign('grupo')->references('id')->on('grupos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('aula')->references('id')->on('aulas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('materia')->references('id')->on('materias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('docente')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
