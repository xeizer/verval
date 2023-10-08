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
        Schema::create('kecs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kota_id')->unsigned();
            $table->string('nama');
            $table->timestamps();
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecs');
    }
};
