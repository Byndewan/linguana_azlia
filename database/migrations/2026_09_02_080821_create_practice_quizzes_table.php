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
        Schema::create('practice_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_module_id')->constrained('sub_modules')->onDelete('cascade');
            $table->enum('type', ['listen_select', 'fill_blank']);
            $table->text('question_text');
            $table->string('audio_text')->nullable(); 
            $table->text('language_code')->nullable();
            $table->json('options')->nullable(); 
            $table->string('correct_answer'); 
            $table->integer('order_number')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_quizzes');
    }
};
