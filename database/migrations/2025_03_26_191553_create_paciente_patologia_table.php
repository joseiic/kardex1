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
        Schema::create('paciente_patologia', function (Blueprint $table) {
            $table->id('id_pp');
            $table->string('rut_paciente', 15);
            $table->foreignId('id_patologia')->constrained('patologia');
            $table->foreign('rut_paciente')->references('rut_paciente')->on('pacientes')->onDelete('cascade');
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
        Schema::dropIfExists('paciente_patologia');
    }
};
