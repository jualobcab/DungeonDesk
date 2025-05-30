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
        Schema::create('diary', function (Blueprint $table) {
            $table->integer('entry_id', true);
            $table->integer('id_character')->nullable()->index('id_character');
            $table->integer('id_campaign')->nullable()->index('id_campaign');
            $table->text('entry')->nullable();
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diary');
    }
};
