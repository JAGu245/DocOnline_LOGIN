<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakaryawanTable extends Migration
{
    public function up()
    {
        Schema::create('datakaryawan', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('pangkat');
            $table->string('divisi');
            $table->string('dealer');
            $table->string('posisi');
            $table->string('divisiho');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datakaryawan');
    }
}
