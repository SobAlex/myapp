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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('owner_id');
            $table->unsignedInteger('category_id');
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->boolean('isPublick')->default('1');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('owner_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
