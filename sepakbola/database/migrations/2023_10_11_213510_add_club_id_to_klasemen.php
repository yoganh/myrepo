<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('klasemens', function (Blueprint $table) {
            // Tambahkan kolom 'club_id' hanya jika belum ada
            if (!Schema::hasColumn('klasemens', 'club_id')) {
                $table->unsignedBigInteger('club_id')->nullable();
                $table->foreign('club_id')->references('id')->on('clubs');
            }
        });
    }

    public function down()
    {
        Schema::table('klasemens', function (Blueprint $table) {
            // Hapus kolom 'club_id' hanya jika kolom tersebut ada
            if (Schema::hasColumn('klasemens', 'club_id')) {
                $table->dropForeign(['club_id']);
                $table->dropColumn('club_id');
            }
        });
    }
};





?>
