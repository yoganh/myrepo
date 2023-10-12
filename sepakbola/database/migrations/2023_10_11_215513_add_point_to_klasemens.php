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
        Schema::table('klasemens', function (Blueprint $table) {
            $table->integer('point')->default(0); // Kolom 'point' dengan nilai default 0
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('klasemens', function (Blueprint $table) {
            $table->dropColumn('point'); // Menghapus kolom 'point'
        });
    }
};
