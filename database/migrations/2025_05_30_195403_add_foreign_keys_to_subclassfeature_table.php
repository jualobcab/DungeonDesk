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
        Schema::table('subclassfeature', function (Blueprint $table) {
            $table->foreign(['feature_id'], 'subclassfeature_ibfk_1')->references(['feature_id'])->on('feature')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['subclass_id'], 'subclassfeature_ibfk_2')->references(['subclass_id'])->on('subclass')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subclassfeature', function (Blueprint $table) {
            $table->dropForeign('subclassfeature_ibfk_1');
            $table->dropForeign('subclassfeature_ibfk_2');
        });
    }
};
