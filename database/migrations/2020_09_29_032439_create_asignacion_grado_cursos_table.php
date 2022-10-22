<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionGradoCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_grado_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_grado_seccion')->constrained('grado_seccions');
           // $table->foreignId('id_curso')->constrained('cursos');
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
        Schema::dropIfExists('asignacion_grado_cursos');
    }
}
