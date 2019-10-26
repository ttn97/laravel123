<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class mymigration2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TieuDe')->unsigned();
            $table->integer('idChuyenMuc')->unsigned();
            $table->integer('SoLuotXem');
            $table->integer('NoiBat');
            $table->string('NoiDung');
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
        Schema::drop('tintuc');
    }
}
