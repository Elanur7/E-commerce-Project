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
        Schema::create('Adress', function (Blueprint $table) {
            $table->id();
            $table->integer("UserId");
            $table->string("UserName");
            $table->string("AddressDefinition");
            $table->string("Name");
            $table->string("Surname");
            $table->string("IdNumber");
            $table->string("City");
            $table->string("District");
            $table->string("Address");
            $table->string("Telephone");
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
        Schema::dropIfExists('Adress');
    }
};
