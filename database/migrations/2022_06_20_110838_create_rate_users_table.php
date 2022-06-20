<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rate_id');
            $table->unsignedBigInteger('user_id');

            //IDX
            $table->index('rate_id','pul_rate_idx');
            $table->index('user_id','pul_user_idx');

            //FOREIGN KEY
            $table->foreign('rate_id','rate_user_fk')->on('rates')->references('id');
            $table->foreign('user_id','rate_user_fk')->on('users')->references('id');
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
        Schema::dropIfExists('rate_users');
    }
}
