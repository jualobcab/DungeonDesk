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
        Schema::table('subclass', function (Blueprint $table) {
            $table->foreign(['class_id'], 'subclass_ibfk_1')->references(['class_id'])->on('class')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subclass', function (Blueprint $table) {
            $table->dropForeign('subclass_ibfk_1');
        });
    }
};
