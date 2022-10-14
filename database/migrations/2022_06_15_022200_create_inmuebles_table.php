<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('clientIdApi')->nullable();
            $table->string('estadoTabla')->nullable();
            $table->string('calle');
            $table->string('exterior')->nullable();
            $table->string('interior')->nullable();
            $table->string('colonia');
            $table->string('ciudad_alcaldia');
            $table->string('estado');
            $table->string('cp');
            $table->string('descripcion');
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
        Schema::dropIfExists('inmuebles');
    }
}
