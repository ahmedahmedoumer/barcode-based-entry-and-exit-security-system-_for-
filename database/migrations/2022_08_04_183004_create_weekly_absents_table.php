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
        Schema::create('weekly_absents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->Integer('Monday')->nullable()->default(0);
            $table->Integer('Tuesday')->nullable()->default(0);
            $table->Integer('Wednesday')->nullable()->default(0);
            $table->Integer('Thursday')->nullable()->default(0);
            $table->Integer('Friday')->nullable()->default(0);
            $table->Integer('Saturday')->nullable()->default(0);
            $table->Integer('Sunday')->nullable()->default(0);
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
        Schema::dropIfExists('weekly_absents');
    }
};
