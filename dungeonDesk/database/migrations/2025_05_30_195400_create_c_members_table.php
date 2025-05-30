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
        Schema::create('c_members', function (Blueprint $table) {
            $table->integer('id_character');
            $table->integer('id_campaign')->index('id_campaign');

            $table->primary(['id_character', 'id_campaign']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_members');
    }
};
