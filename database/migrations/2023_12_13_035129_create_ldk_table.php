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
        Schema::create('ldk', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('revision_number');
            $table->string('ldk_number')->unique();
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('master_bk');
            $table->string('reactivity');
            $table->string('composition');
            $table->text('hazard_identification')->nullable();
            $table->string('physical_state');
            $table->string('colour')->nullable();
            $table->string('odour')->nullable();
            $table->string('ph')->nullable();
            $table->string('melting_point')->nullable();
            $table->string('lfl')->nullable();
            $table->string('ufl')->nullable();
            $table->string('p3k_eye')->nullable();
            $table->string('p3k_skin')->nullable();
            $table->string('p3k_ingestion')->nullable();
            $table->string('p3k_inhalation')->nullable();
            $table->string('p3k_others')->nullable();
            $table->text('handling_storage')->nullable();
            $table->text('spill_leakage')->nullable();
            $table->text('disposal')->nullable();
            $table->text('ecology_info')->nullable();
            $table->text('toxicology_info')->nullable();
            $table->text('regulation')->nullable();
            $table->text('shipping')->nullable();
            $table->text('others_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ldk');
    }
};
