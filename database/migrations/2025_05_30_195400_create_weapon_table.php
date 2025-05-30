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
        Schema::create('weapon', function (Blueprint $table) {
            $table->integer('equipment_id')->nullable()->index('equipment_id');
            $table->integer('weapon_id', true);
            $table->string('type', 30)->nullable();
            $table->integer('damage_die')->nullable();
            $table->string('damage_type', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapon');
    }
};
