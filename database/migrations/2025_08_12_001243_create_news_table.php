<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug_ind')->unique();
            $table->string('slug_eng')->unique();
            $table->string('title_ind');
            $table->string('title_eng');
            $table->date('publish_date');
            $table->text('content_ind');
            $table->text('content_eng');
            $table->enum('category', ['blog', 'news']);
            $table->string('image'); // size 640 x 427px
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
