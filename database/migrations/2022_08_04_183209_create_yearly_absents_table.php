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
        Schema::create('yearly_absents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->Integer('September')->nullable()->default(0);
            $table->Integer('October')->nullable()->default(0);
            $table->Integer('November')->nullable()->default(0);
            $table->Integer('December')->nullable()->default(0);
            $table->Integer('January')->nullable()->default(0);
            $table->Integer('February')->nullable()->default(0);
            $table->Integer('March')->nullable()->default(0);
            $table->Integer('April')->nullable()->default(0);
            $table->Integer('May')->nullable()->default(0);
            $table->Integer('June')->nullable()->default(0);
            $table->Integer('July')->nullable()->default(0);
            $table->Integer('Augest')->nullable()->default(0);
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
        Schema::dropIfExists('yearly_absents');
    }
};
