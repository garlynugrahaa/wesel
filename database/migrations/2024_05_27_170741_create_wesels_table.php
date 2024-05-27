<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wesels', function (Blueprint $table) {
            $table->uuid('id');
            $table->dateTime('datetime');
            $table->double('voltage', 15, 2);
            $table->double('current', 15, 2);
            $table->string('message', 100);
            $table->enum('category', ['Event', 'Warning', 'Alarm']);
            $table->string('area', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wesels');
    }
};
