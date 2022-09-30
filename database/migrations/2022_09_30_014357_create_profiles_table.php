<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('dni',8)->unique();
            $table->string('correo',100);
            $table->dateTime('fecha_nac');
            $table->bigInteger('bu_pro_id')->unsigned();
            $table->bigInteger('co_pro_id')->unsigned();
            $table->foreign('bu_pro_id')->references('id')->on('businessprofiles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('co_pro_id')->references('id')->on('contractprofiles')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
