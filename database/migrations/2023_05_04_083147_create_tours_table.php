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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->float('price'); 
            $table->float('discount_price')->nullable();

            $table->integer('capacity');
            $table->integer('qty');
            $table->float('discount_price')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('vendor_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
        Schema::dropIfExists('country_tour');
    }
};
