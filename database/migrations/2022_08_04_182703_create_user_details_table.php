<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->String('id_number')->nullable(false);
            $table->String('f_name')->nullable(false);
            $table->String('l_name')->nullable(false);
            $table->Double('phone_no')->nullable(false);
            $table->String('department')->nullable(false);
            $table->String('Batch')->nullable(false);
            $table->String('sex')->nullable(false);
            $table->String('email')->nullable(false);
            $table->String('image')->nullable(false);
            $table->String('section')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_details');
    }
};
