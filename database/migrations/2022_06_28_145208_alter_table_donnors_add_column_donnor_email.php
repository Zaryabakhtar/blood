<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDonnorsAddColumnDonnorEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donnors', function (Blueprint $table) {
            $table->string('donnor_email')->nullable()->after('donnor_name');
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
            $table->dropColumn('donnor_email');
        });
    }
}
