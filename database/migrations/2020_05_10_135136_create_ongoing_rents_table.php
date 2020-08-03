<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOngoingRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongoing_rents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('renter_id')->unsigned();
            $table->foreign('renter_id')->references('id')->on('users');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');

            $table->integer('owner_id');
            $table->integer('amount');
            $table->string('date_from');
            $table->string('date_to');
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
        Schema::dropIfExists('ongoing_rents');
    }
}
