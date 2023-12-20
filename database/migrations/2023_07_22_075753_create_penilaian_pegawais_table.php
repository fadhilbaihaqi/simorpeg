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
        Schema::create('penilaian_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('bulan_penilaian');
            $table->integer('problem_solving');
            $table->integer('clean_code');
            $table->integer('database');
            $table->integer('responsibility'); // tanggung jawab
            $table->integer('leadership'); //pemimpin
            $table->integer('decition'); // keputusan
            $table->string('grade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('penilaian_pegawai');
    }
};
