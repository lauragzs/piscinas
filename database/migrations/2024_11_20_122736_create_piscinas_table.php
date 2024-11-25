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
        Schema::create('piscinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombrep');
            $table->string('cliente');
            $table->string('pais')->nullable();
            $table->string('telefono');
            $table->enum('tipo',['regular','irregular']);
            $table->integer('profundidad');
            $table->integer('largo')->nullable();
            $table->integer('ancho')->nullable();
            $table->integer('longitud')->nullable();
            $table->decimal('area');
            $table->decimal('perimetro');
            $table->decimal('volumen');
            $table->enum('tipologia',['privada','publica']);
            $table->string('caudal');
            $table->string('succion');
            $table->string('impulsion');
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
        Schema::dropIfExists('piscinas');
    }
};
