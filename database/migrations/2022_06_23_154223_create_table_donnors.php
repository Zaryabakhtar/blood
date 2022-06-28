<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDonnors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donnors', function (Blueprint $table) {
            $table->bigIncrements('donnor_id');
            $table->string('donnor_picture');
            $table->string('donnor_name');
            $table->string('donnor_address');
            $table->date('last_blood_donation');
            $table->string('donnor_phone');
            $table->integer('donnor_visits')->default(1);
            $table->string('donnor_gender');
            $table->date('donnor_dob');
            $table->integer('donnor_age');
            $table->string('donnor_barcode');
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
        Schema::dropIfExists('donnors');
    }
}
