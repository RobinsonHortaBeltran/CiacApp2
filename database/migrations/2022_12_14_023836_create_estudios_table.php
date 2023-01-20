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
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->string('servicio');
            $table->date('fecha');
            $table->foreignId('tipo_id')->constrained('tipos_estudios')->nullable();
            $table->foreignId('creator')->constrained('users')->nullable();
            $table->string('trm');
            $table->text('descripcion');
            $table->enum('status',['activo','borrador','finalizado']);
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
        Schema::dropIfExists('estudios');
    }
};
