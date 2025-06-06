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
        Schema::create('c_classes', function (Blueprint $table) {
            $table->integer('class_id');
            $table->integer('id_character')->index('id_character');
            $table->integer('subclass_id')->nullable()->index('subclass_id');
            $table->integer('level')->default(1);

            $table->primary(['class_id', 'id_character']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_classes');
    }
};
