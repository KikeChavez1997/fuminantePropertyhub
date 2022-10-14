<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('clientIdApi')->nullable();
            $table->string('inmueble_id');
            $table->string('nombre_empresa')->nullable();
            $table->string('rfc')->nullable();
            $table->string('servicio');
            $table->string('tipoServicio');
            $table->string('codigo_postal');
            $table->string('superficie');
            $table->string('periodicidad');
            $table->string('costo');
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
        Schema::dropIfExists('reservacions');
    }
}
