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
        Schema::create('final_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('sub_modules')->onDelete('cascade');
            $table->enum('type', ['listen_select', 'listen_input', 'fill_blank_mc','fill_blank_input']);
            $table->text('question_text');
            $table->string('question_audio')->nullable(); 
            $table->text('language_code')->nullable();
            $table->json('options')->nullable(); 
            $table->string('correct_answer'); 
            $table->integer('point')->default(10);
            $table->integer('time'); 
            $table->integer('order_number')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_quizzes');
    }
};
