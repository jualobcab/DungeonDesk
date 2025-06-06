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
        Schema::table('c_equipment', function (Blueprint $table) {
            $table->foreign(['equipment_id'], 'c_equipment_ibfk_1')->references(['equipment_id'])->on('equipment')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['id_character'], 'c_equipment_ibfk_2')->references(['id_character'])->on('characters')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('c_equipment', function (Blueprint $table) {
            $table->dropForeign('c_equipment_ibfk_1');
            $table->dropForeign('c_equipment_ibfk_2');
        });
    }
};
