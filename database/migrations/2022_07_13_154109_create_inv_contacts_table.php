<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('idApiClient')->nullable();
            $table->string('inVnombre');
            $table->string('inVapellidos');
            $table->string('inVtelefono');
            $table->string('inVcorreo_electronico');
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
        Schema::dropIfExists('inv_contacts');
    }
}
