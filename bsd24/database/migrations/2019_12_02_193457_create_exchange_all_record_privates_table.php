<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeAllRecordPrivatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_all_record_privates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exchange_tracking_id');
            $table->string('sending');
            $table->string('receiving');
            $table->string('from_amount');
            $table->string('to_amount');
            $table->string('transaction');
            $table->string('user_email');
            $table->string('status')->default("Admin checking for proper transactions");
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_all_record_privates');
    }
}
