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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gambar')->nullable();
            $table->string('tlp')->nullable();
            $table->string('nik')->nullable();
            $table->string('jkel')->nullable();
            $table->string('agama')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('status')->default(0);
            $table->string('prov')->nullable();
            $table->string('kota')->nullable();
            $table->string('kec')->nullable();
            $table->string('kel')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
