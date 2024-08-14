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
        Schema::create('itsm_assets', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('category_id');
            $table->string('account');
            $table->string('capex_code');
            $table->timestamp('purchased_at');
            $table->string('depreciation_method');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('itsm_asset_categories');
            $table->foreign('device_id')->references('id')->on('itsm_devices');
            $table->foreign('company_id')->references('id')->on('companion_companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itsm_assets');
    }
};
