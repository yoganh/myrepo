<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkorTable extends Migration
{
    public function up()
    {
        Schema::create('skor', function (Blueprint $table) {
            $table->id();
            $table->string('tim_satu');
            $table->integer('skor_satu');
            $table->string('tim_dua');
            $table->integer('skor_dua');
            $table->integer('point_tim_satu');
            $table->integer('point_tim_dua');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skor');
    }
}

