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
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('loan_id');
            $table->unsignedBigInteger('user_fk');
            $table->unsignedBigInteger('book_fk');
            $table->date('loan_date');
            $table->date('return_date');
            $table->timestamps();

            $table->foreign('user_fk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_fk')->references('book_id')->on('books')->onDelete('cascade');

            $table->comment('Table for registering book loans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};