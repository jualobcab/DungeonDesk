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
        Schema::create('subclassfeature', function (Blueprint $table) {
            $table->integer('feature_id');
            $table->integer('subclass_id')->index('subclass_id');
            $table->integer('level')->nullable();

            $table->primary(['feature_id', 'subclass_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subclassfeature');
    }
};
