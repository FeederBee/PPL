<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('list_teman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('id_teman_user');
            $table->string('status');
            $table->string('nama',50);
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('no_hp',12);
            $table->string('image')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('id_teman_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_teman');
    }
};
