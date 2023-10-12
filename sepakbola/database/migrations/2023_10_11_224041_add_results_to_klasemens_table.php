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
        $table->integer('menang')->default(0);
        $table->integer('kalah')->default(0);
        $table->integer('seri')->default(0);
    });
}

public function down()
{
    Schema::table('klasemens', function (Blueprint $table) {
        $table->dropColumn('menang');
        $table->dropColumn('kalah');
        $table->dropColumn('seri');
    });
}
};
