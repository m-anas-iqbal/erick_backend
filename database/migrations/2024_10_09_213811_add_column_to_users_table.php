<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->nullable();
        });
        Schema::table('feeds', function (Blueprint $table) {
            $table->integer('status')->nullable();
            $table->integer('extra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('feeds', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('extra');
        });
    }
}
