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
        Schema::table('weapon', function (Blueprint $table) {
            $table->foreign(['equipment_id'], 'weapon_ibfk_1')->references(['equipment_id'])->on('equipment')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->dropForeign('weapon_ibfk_1');
        });
    }
};
