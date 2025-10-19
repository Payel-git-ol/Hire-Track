<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('name');
            $table->string('Job title');
            $table->string('title');
            $table->string('Experience');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
