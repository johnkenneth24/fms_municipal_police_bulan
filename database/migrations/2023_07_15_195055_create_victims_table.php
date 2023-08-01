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
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('suffix')->nullable();
            $table->string('birthdate');
            $table->string('birthplace');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('occupation')->nullable();
            $table->string('education')->nullable();
            $table->string('citizenship');
            $table->string('address');
            $table->string('contact_number');
            $table->string('ethnic');
            $table->string('relation_to_suspect')->nullable();
            $table->string('victim_status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victims');
    }
};
