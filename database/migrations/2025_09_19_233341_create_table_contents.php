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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->references('id')->on('tenants');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('code',100)->unique();
            $table->string('name',100)->nullable();
            $table->foreignId('module_id')->references('id')->on('modules');
            $table->integer('type')->default(5);
            $table->string('title',100)->nullable();
            $table->longText('body')->nullable();
            $table->json('info')->nullable();
            $table->string('image')->nullable();
            $table->string('data')->nullable(); //link url, link youtube, audio
            $table->integer('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
