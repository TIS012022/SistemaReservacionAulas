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
            $table->string('hora_ini');
            $table->string('periodo');
            $table->date('dia');
            $table->string('estado');

          
            $table->unsignedBigInteger('aula');
            $table->foreign('aula')->references('id')->on('aulas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('docmateria_id');
            $table->foreign('docmateria_id')->references('id')->on('docmaterias')->onUpdate('cascade')->onDelete('cascade');
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
