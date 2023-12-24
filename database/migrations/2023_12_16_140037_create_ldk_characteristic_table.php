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
        Schema::create('ldk_characteristic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ldk_id');
            $table->unsignedBigInteger('characteristic_id');
            $table->timestamps();

            $table->foreign('ldk_id')->references('id')->on('ldk');
            $table->foreign('characteristic_id')->references('id')->on('characteristic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ldk_characteristic');
    }
};
