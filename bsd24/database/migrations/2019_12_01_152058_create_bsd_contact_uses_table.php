<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBsdContactUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsd_contact_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name',100);
            $table->string('user_email',100);
            $table->string('subject',100);
            $table->string('message',1000);
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
        Schema::dropIfExists('bsd_contact_uses');
    }
}
