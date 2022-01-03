<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_has_users', function (Blueprint $table) {
            $table->unsignedBigInteger('keytime_id');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->timestamps();
            $table->primary('keytime_id');
            $table->foreign('keytime_id')->references('id')->on('keytimes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_has_users');
    }
}
