<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDonnorsAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donnors', function (Blueprint $table) {
            $table->integer('sr_no')->default(0)->after('donnor_id');
            $table->bigInteger('blood_group_id')->before('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donnors', function (Blueprint $table) {
            $table->dropColumn('sr_no');
            $table->dropColumn('blood_group_id');
        });
    }
}
