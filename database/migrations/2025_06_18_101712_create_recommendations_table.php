<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('recommendations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('medical_card_id')->constrained()->onDelete('cascade');
        $table->text('text'); // текст рекомендації
        $table->boolean('is_done')->default(false); // виконано чи ні
        $table->timestamp('done_at')->nullable(); // коли виконано
        $table->foreignId('done_by')->nullable()->constrained('users')->nullOnDelete(); // ким виконано
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
