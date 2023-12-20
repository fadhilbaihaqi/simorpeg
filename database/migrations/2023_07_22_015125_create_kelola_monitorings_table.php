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
        Schema::create('kelola_monitoring', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('task_harian');
            $table->integer('status')->default(0);
            $table->string('upload')->nullable();
            $table->date('tanggal_selesai')->nullable();
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
        Schema::dropIfExists('kelola_monitoring');
    }
};
