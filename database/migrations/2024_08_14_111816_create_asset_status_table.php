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
        Schema::create('itsm_asset_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('itsm_statuses');
            $table->foreign('asset_id')->references('id')->on('itsm_assets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itsm_asset_status');
    }
};
