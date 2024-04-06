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
        Schema::create('post', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('title');
            $table->string('categories');
            $table->string('description');
            $table->string('slug');
            $table->timestamp('tanggalDibuat');
            $table->timestamps();

            $table->foreignId('userID');
            $table->foreign('userID')->references('userID')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
