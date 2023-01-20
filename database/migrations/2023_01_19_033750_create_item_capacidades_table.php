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
        Schema::create('item_capacidades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('creator')->nullable();
            $table->foreignId('tipo_sub_capaciodad')->constrained('tipo_sub_capacidades')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
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
        Schema::dropIfExists('item_capacidades');
    }
};
