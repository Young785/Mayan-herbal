<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_tree', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('users_tree.ancestor');
            $table->string('users_tree.depth');
            $table->string('users_tree.descendant');
            $table->string('referrer');
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
        Schema::dropIfExists('users_tree');
    }
}
