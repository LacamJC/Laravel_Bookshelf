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
        Schema::create('books', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title', 255)->unique();
            $table->string('authors', 250);
            $table->string('nacional', 1);
            $table->string('gender', 100);
            $table->string('publisher', 150);
            $table->text('description', 200);
            $table->string('book_image')->nullable();
            $table->integer('pages_qtd');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
