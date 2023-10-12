<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('klasemens', function (Blueprint $table) {
            $table->unsignedBigInteger('club_id')->nullable();
            $table->foreign('club_id')->references('id')->on('clubs');
        });
    }

    public function down()
    {
        Schema::table('klasemens', function (Blueprint $table) { // Ubah 'klasemen' menjadi 'klasemens'
            $table->dropForeign(['club_id']);
            $table->dropColumn('club_id');
        });
    }
};
