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
        Schema::create('master_bk', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('material_number')->unique()->comment('unique string, the format like 01-93-00418. Assigned by Purchasing Admin');
            $table->string('material_desc')->comment('Label of material number. Assigned by Purchasing Admin');
            $table->string('maker')->comment('Institution where BK comes from. Assigned by Purchasing Admin');
            $table->string('ldk_fr_maker')->nullable()->comment('ldk document from maker. Assigned by Purchasing Admin');
            $table->set('approve_reject', ['approved', 'rejected'])->nullable()->comment('approved/reject. Assigned by EHS Admin');
            $table->string('comment')->nullable()->comment('Input comment if reject. Assigned by EHS Admin');
            $table->set('status_bk', [0, 1, 2])->default(0)->comment('0:Need Review-> bila sudah di-submit dan belum di-review admin EHS atau bila sudah diperbaiki (dari status reject) dan belum di-review admin EHS; 1:Rejected->bila rejected oleh admin EHS, dan belum diperbaiki. 2:Active->sudah di-review admin EHS dan di-approved. Assigned by System');
            $table->foreignId('created_by')->nullable()->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('master_bk');
    }
};
