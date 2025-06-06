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
        Schema::table('armor', function (Blueprint $table) {
            $table->foreign(['equipment_id'], 'armor_ibfk_1')->references(['equipment_id'])->on('equipment')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('armor', function (Blueprint $table) {
            $table->dropForeign('armor_ibfk_1');
        });
    }
};
