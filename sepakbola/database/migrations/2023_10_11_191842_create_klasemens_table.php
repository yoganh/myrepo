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
        Schema::create('klasemens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id')->nullable();
            $table->integer('ma')->default(0); // Menambahkan default(0) untuk ma
            $table->integer('me')->default(0); // Menambahkan default(0) untuk me (jumlah menang)
            $table->integer('s')->default(0);  // Menambahkan default(0) untuk s (jumlah seri)
            $table->integer('k')->default(0);  // Menambahkan default(0) untuk k (jumlah kalah)
            $table->integer('gm')->default(0); // Menambahkan default(0) untuk gm (goal menang)
            $table->integer('gk')->default(0); // Menambahkan default(0) untuk gk (goal kalah)
            $table->integer('point')->default(0);
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('clubs');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klasemens');
    }
};
