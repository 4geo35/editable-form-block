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
        Schema::create('form_block_records', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->text("description")->nullable();
            $table->unsignedBigInteger("image_id")->nullable();
            $table->dateTime("use_modal")->nullable();
            $table->string("button_text")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_block_records');
    }
};
