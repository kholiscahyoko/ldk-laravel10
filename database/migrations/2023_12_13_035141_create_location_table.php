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
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('master_bk');
            $table->string('location')->comment('WAHO | MELTING | ENGINEERING | WELDING | MACHINING | PUT | PC | TSD | OBM | FPR | Lainnya (input freetext)');
            $table->string('uom');
            $table->integer('qty');
            $table->string('pic_nrp');
            $table->string('pic_name');
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
