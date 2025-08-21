<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('roles', 'name')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->renameColumn('name', 'handle')->unique();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
