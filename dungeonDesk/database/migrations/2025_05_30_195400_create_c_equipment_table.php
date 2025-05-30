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
        Schema::create('c_equipment', function (Blueprint $table) {
            $table->integer('equipment_id');
            $table->integer('id_character')->index('id_character');
            $table->integer('quantity')->nullable();

            $table->primary(['equipment_id', 'id_character']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_equipment');
    }
};
