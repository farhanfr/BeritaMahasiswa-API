<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->Increments('mahasiswa_id');
            $table->string('mahasiswa_name');
            $table->string('mahasiswa_nim');
            $table->string('mahasiswa_class');
            $table->date('mahasiswa_born');
            $table->string('mahasiswa_password');
            $table->string('mahasiswa_token')->nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
}
