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
        Schema::create('itsm_specifications', function (Blueprint $table) {
            $table->id();
            $table->string('part');
            $table->text('specification');
            $table->unsignedBigInteger('brand_id');
            $table->text('remark')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('itsm_specifications');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itsm_specifications');
    }
};
