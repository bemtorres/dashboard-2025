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

      Schema::create('modules', function (Blueprint $table) {
        $table->id();
        // $table->foreignId('course_id')->references('id')->on('courses');
        $table->foreignId('tenant_id')->references('id')->on('tenants');
        $table->foreignId('user_id')->references('id')->on('users');
        $table->string('code',100)->unique();
        $table->string('name',100);
        $table->json('info')->nullable();
        $table->longText('objective')->nullable();
        // $table->integer('position');
        $table->integer('items_total')->default(0);
        // $table->boolean('quiz')->default(false);
        $table->integer('status')->default(1);
        $table->timestamps();
      });

      Schema::create('course_modules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_id')->references('id')->on('courses');
        $table->foreignId('module_id')->references('id')->on('modules');
        $table->integer('position');
        $table->integer('status')->default(1);
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
