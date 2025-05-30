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
        Schema::table('diary', function (Blueprint $table) {
            $table->foreign(['id_character'], 'diary_ibfk_1')->references(['id_character'])->on('characters')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_campaign'], 'diary_ibfk_2')->references(['id_campaign'])->on('campaign')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diary', function (Blueprint $table) {
            $table->dropForeign('diary_ibfk_1');
            $table->dropForeign('diary_ibfk_2');
        });
    }
};
