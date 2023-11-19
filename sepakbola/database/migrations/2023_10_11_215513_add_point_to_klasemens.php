<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Hapus kolom 'point' jika sudah ada
        if (Schema::hasColumn('klasemens', 'point')) {
            Schema::table('klasemens', function (Blueprint $table) {
                $table->dropColumn('point');
            });
        }

        // Tambahkan kolom 'point' dengan nilai default 0
        Schema::table('klasemens', function (Blueprint $table) {
            $table->integer('point')->default(0);
        });
    }

    public function down()
    {
        // Hapus kolom 'point'
        Schema::table('klasemens', function (Blueprint $table) {
            $table->dropColumn('point');
        });
    }
};

?>