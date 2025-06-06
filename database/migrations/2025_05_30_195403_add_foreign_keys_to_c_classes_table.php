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
        Schema::table('c_classes', function (Blueprint $table) {
            $table->foreign(['id_character'], 'c_classes_ibfk_1')->references(['id_character'])->on('characters')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['class_id'], 'c_classes_ibfk_2')->references(['class_id'])->on('classInfo')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['subclass_id'], 'c_classes_ibfk_3')->references(['subclass_id'])->on('subclass')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('c_classes', function (Blueprint $table) {
            $table->dropForeign('c_classes_ibfk_1');
            $table->dropForeign('c_classes_ibfk_2');
            $table->dropForeign('c_classes_ibfk_3');
        });
    }
};
