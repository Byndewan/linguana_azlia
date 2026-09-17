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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_path_id')
                  ->constrained('learning_paths')
                  ->onDelete('cascade');
            $table->text('title');
            $table->text('icon');
            $table->text('color');
            $table->integer('point')->default(10);
            $table->integer('time');
            $table->text('background_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
