<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroPrestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('libro_prestados');
        Schema::create('libro_prestados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_prestamo');
            $table->dateTime('fecha_devolucion')->nullable();;
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('libro_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('libro_id')->references('id')->on('libros');
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
        Schema::dropIfExists('libro_prestados');
    }
}
