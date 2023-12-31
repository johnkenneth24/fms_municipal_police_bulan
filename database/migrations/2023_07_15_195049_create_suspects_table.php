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
        Schema::create('suspects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crime_record_id')->references('id')->on('crime_records')->constrained()->onDelete('cascade');
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('suffix')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('education')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('address')->nullable();
            // $table->string('ethnic');
            $table->string('relation_to_victim')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('used_weapon')->nullable();
            $table->string('suspect_status')->nullable();
            $table->string('suspect_motive')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspects');
    }
};
