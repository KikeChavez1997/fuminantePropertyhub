<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_historials', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('clientIdApi')->nullable();
            $table->string('fecha');
            $table->string('hora');
            $table->string('descripcion');
            $table->string('monto');
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
        Schema::dropIfExists('inv_historials');
    }
}
