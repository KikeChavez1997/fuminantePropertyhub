<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_user');
            $table->string('idApiClient')->nullable();
            $table->string('inVnombre_negocio')->nullable();
            $table->string('inVrfc')->nullable();
            $table->string('inVcalle');
            $table->string('inVnumero_interior');
            $table->string('inVnumero_exterior')->nullable();
            $table->string('inVcolonia');
            $table->string('inValcaldia');
            $table->string('inVperiodicidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_users');
    }
}
