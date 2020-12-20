<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');

            if (config('roles.migrations.useBigInteger')) {
                $table->bigInteger('role_id')->unsigned();
                $table->bigInteger('user_id')->unsigned();
            } else {
                $table->integer('role_id')->unsigned();
                $table->integer('user_id')->unsigned();
            }

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
        Schema::dropIfExists('role_user');
    }
}
