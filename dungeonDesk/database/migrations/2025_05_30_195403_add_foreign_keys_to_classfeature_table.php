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
        Schema::table('classfeature', function (Blueprint $table) {
            $table->foreign(['feature_id'], 'classfeature_ibfk_1')->references(['feature_id'])->on('feature')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['class_id'], 'classfeature_ibfk_2')->references(['class_id'])->on('class')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('classfeature', function (Blueprint $table) {
            $table->dropForeign('classfeature_ibfk_1');
            $table->dropForeign('classfeature_ibfk_2');
        });
    }
};
