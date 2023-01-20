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
        Schema::create('configuracion_proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('proveedor');
            $table->string('aeronave')->nullable();
            $table->string('nombre_aeronave')->nullable();
            $table->string('capacidad')->nullable();
            $table->string('nombre_capacidad')->nullable();
            $table->string('otra_capacidad')->nullable();
            $table->string('nombre_otra_capacidad')->nullable();
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
        Schema::dropIfExists('configuracion_proveedores');
    }
};
