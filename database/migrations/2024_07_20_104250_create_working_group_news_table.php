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
        Schema::create('working_group_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('working_group_id')->constrained();
            $table->string('title');
            $table->text('content')->nullable();
            $table->json('attachments')->nullable();
            $table->foreignId('author_id')->constrained('users');
            $table->string('type')->default('news');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_group_news');
    }
};
