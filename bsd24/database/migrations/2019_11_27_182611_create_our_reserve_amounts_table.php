<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurReserveAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_reserve_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reserve_name');
            $table->string('reserve_image');
            $table->string('reserve_currency');
            $table->double('reserve_amount',15,2);
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
        Schema::dropIfExists('our_reserve_amounts');
    }
}
