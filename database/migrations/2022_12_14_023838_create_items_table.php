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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('material');
            $table->string('cantidad');
            $table->string('u_medida');
            $table->string('desc_material');
            $table->string('parte_numero');
            $table->string('parte_numero_alterno')->nullable();
            $table->string('condicion_requerida');
            $table->string('forma_pago');
            $table->foreignId('estudio_id')->constrained('estudios')->nullable();
            $table->foreignId('creator')->constrained('users')->nullable();
            $table->text('servicio');
            $table->enum('status',['1','0'])->default('1');
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
        Schema::dropIfExists('items');
    }
};
