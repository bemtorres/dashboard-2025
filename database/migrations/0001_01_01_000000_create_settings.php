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
        Schema::create('settings', function (Blueprint $table) {
          $table->id();
          $table->string('name',100);
          $table->string('logo')->nullable();
          $table->string('favicon')->nullable();
          $table->json('info')->nullable();
          $table->timestamps();
        });

        Schema::create('tenants', function (Blueprint $table) {
          $table->id();
          $table->string('code',100)->unique();
          $table->string('name',100);
          $table->string('logo')->nullable();
          $table->string('favicon')->nullable();
          $table->string('email')->nullable();
          $table->json('info')->nullable();
          $table->integer('status')->default(1);
          $table->boolean('active')->default(true);
          $table->timestamps();
        });

        Schema::create('tenants_associated', function (Blueprint $table) {
          $table->id();
          $table->foreignId('tenant_id')->references('id')->on('tenants');
          $table->foreignId('tenant_associated_id')->references('id')->on('tenants');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academy_courses');
    }
};
