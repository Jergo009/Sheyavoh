<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->string('nombre_apellido');
            $table->string('fecha_nacimiento');
            $table->string('lugar_origen');
            $table->string('dpi');
            $table->string('genero');
            $table->string('estado_civil');
            $table->string('direccion');
            $table->string('religion');
            $table->string('profesion_oficio');
            $table->string('lugar_trabajo');
            $table->string('estudia');
            $table->string('grado_actual');
            $table->string('establecimiento');
            $table->string('persona_responsable');
            $table->string('parentesco');
            $table->string('telefono');
            $table->string('nombre_madre');
            $table->string('dpi_madre');
            $table->string('nombre_padre');
            $table->string('dpi_padre');
            $table->string('hospitalizado');
            $table->string('asistencia_psi');
            $table->string('tipo_servicio');
            $table->string('referido_por');
            $table->string('motivo_consulta');

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
        Schema::dropIfExists('cursos');
    }
}
