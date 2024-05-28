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
        Schema::create('wesel_details', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('wesel_id')->nullable();
            $table->double('voltage', 15, 2);
            $table->double('current', 15, 2);
            $table->timestamps();

            $table->index('wesel_id')->references('id')->on('wesels')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wesel_details');
    }
};
