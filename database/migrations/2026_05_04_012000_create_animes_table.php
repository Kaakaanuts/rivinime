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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', [
                'TV',
                'Movie',
                'OVA',
                'ONA'
            ]);
            $table->string('slug')->unique();
            $table->longText('review');
            $table->decimal('rating', 3, 1);
            $table->string('cover_image', 255);
            $table->year('release_year');
            $table->enum('status', [
                'Completed',
                'Hiatus',
                'Ongoing',
                'Upcoming',
            ]);
            $table->boolean('is_recommended')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
