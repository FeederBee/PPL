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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('no_hp',12);
            $table->string('alamat',50);
            $table->string('status')->default('Customer');
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image')-> nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Users');
    }
};
