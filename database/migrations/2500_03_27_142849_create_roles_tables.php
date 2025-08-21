<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {

            if(config('roles.migrations.useBigInteger')) {
                $table->bigIncrements('id');
            } else {
                $table->increments('id');
            }

            $table->string('handle');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
