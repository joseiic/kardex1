<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->string('rut_paciente')->primary();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->enum('sexo', ['Masculino', 'Femenino']);
            $table->date('fecha_nacimiento');
            $table->string('num_ficha');
            $table->enum('estado', ['Inscrito', 'Trasladado', 'Fallecido']);
            $table->foreignId('id_sector')->constrained('sectores');
            $table->foreignId('id_nacionalidad')->constrained('nacionalidad');
            $table->foreignId('id_pueblo_originario')->constrained('pueblo_originario');
            $table->foreignId('id_previcion')->constrained('previcion');
            $table->string('cod_familia');
            $table->foreign('cod_familia')->references('cod_familia')->on('familias');
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
        Schema::dropIfExists('pacientes');
    }
};
