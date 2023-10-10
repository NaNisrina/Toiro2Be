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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();

            // foreign
            $table->unsignedBigInteger('note_id');
            $table->foreign('note_id')->references('id')->on('notes')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('todo_name');
            $table->string('todo_description');
            $table->date('todo_deadline');
            $table->integer('todo_status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
