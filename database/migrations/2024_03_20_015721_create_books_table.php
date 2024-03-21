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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->string('title');
            $table->unsignedBigInteger('author_id');
            $table->integer('publication_year');
            $table->timestamps();
            
            $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade');

            $table->comment('Table for registering available books in the library');

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
