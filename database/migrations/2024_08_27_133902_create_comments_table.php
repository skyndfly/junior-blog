<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->string('name');
            $table->unsignedBigInteger('articleId');
            $table->unsignedBigInteger('parentId')->nullable();
            $table->string('status');

            $table->foreign('articleId')
                ->references('id')
                ->on('articles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('parentId')
                ->references('id')
                ->on('comments')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
