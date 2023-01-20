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
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->id();
            $table->string('material');
            $table->string('desc_material');
            $table->string('parte_numero');
            $table->string('parte_numero_alterno')->nullable();
            $table->string('condicion');
            $table->string('cantidad');
            $table->string('u_medida');
            $table->string('condicion_ofertada');
            $table->string('um_ofertada');
            $table->string('cantidad_ofertada');
            $table->string('vlr_unidad_sin_iva');
            $table->string('total_sin_iva');
            $table->string('entrega_en_dias');
            $table->string('validez_en_dias');
            $table->string('incoterms');
            $table->string('garantia');
            $table->string('moneda');
            $table->string('id_item');
            $table->text('observaciones');
            $table->foreignId('estudio_id')->constrained('estudios')->nullable();
            $table->foreignId('proveedor')->constrained('users')->nullable();
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
        Schema::dropIfExists('cotizacion');
    }
};
