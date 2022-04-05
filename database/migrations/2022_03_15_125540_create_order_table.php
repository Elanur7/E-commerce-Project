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
        Schema::create('Order', function (Blueprint $table) {
            $table->id();
            $table->integer('BrandId');
            $table->string('BrandName');
            $table->integer('CategoryId');
            $table->string('CategoryName');
            $table->integer('ProductId');
            $table->string('ProductName');
            $table->integer('CargoId');
            $table->string('CargoName');
            $table->string('Status');
            $table->double('Price');
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
        Schema::dropIfExists('Order');
    }
};
