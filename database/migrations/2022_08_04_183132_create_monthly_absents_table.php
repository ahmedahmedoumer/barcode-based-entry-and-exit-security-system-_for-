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
        Schema::create('monthly_absents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->Integer('week1')->nullable()->default(0);
            $table->Integer('week2')->nullable()->default(0);
            $table->Integer('week3')->nullable()->default(0);
            $table->Integer('week4')->nullable()->default(0);
            $table->Integer('total')->nullable()->default(0);
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
        Schema::dropIfExists('monthly_absents');
    }
};
