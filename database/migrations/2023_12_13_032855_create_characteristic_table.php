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
        Schema::create('characteristic', function (Blueprint $table) {
            $table->id();
            $table->string('characteristic_name');
            $table->binary('pictogram');
            $table->text('notes');
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
            $table->foreignId('modified_by')->nullable()->references('id')->on('users');
            $table->foreignId('deleted_by')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic');
    }
};
