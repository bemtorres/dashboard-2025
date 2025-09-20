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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->longText('objective')->nullable();
            $table->string('photo')->default('/images/gallery.jpg');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('code')->unique();
            $table->integer('status')->default(1);
            $table->integer('total_content')->default(0);
            $table->integer('total_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
