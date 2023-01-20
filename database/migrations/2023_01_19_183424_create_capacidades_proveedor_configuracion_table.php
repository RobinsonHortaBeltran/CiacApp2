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
        Schema::create('capacidades_proveedor_configuracion', function (Blueprint $table) {
            $table->id();
            $table->string('proveedor')->nullable;
            $table->string('array');
            $table->string('tipo');
            $table->string('subtipo');
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
        Schema::dropIfExists('capacidades_proveedor_configuracion');
    }
};
