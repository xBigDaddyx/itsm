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
        Schema::create('itsm_devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('type')->nullable();
            $table->string('picture')->nullable();
            $table->string('serial_number')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('itsm_device_categories');
            $table->foreign('brand_id')->references('id')->on('itsm_brands');
            $table->foreign('company_id')->references('id')->on('companion_companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itsm_devices');
    }
};
