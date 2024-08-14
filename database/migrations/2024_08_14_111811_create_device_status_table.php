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
        Schema::create('itsm_device_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('itsm_statuses');
            $table->foreign('device_id')->references('id')->on('itsm_devices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itsm_device_status');
    }
};
