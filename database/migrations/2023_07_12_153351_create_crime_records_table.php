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
        Schema::create('crime_records', function (Blueprint $table) {
            $table->id();
            $table->string('blotter_entry_no');
            $table->string('case_status')->nullable();
            $table->string('case_progress');
            $table->date('date_committed');
            $table->string('time_committed');
            $table->date('date_reported');
            $table->string('time_reported');
            $table->string('incident_location');
            $table->longText('incident_details');

            $table->string('investigator')->nullable();
            $table->string('stage_of_felony')->nullable();
            $table->string('crime_category')->nullable();
            $table->string('crime_committed')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crime_records');
    }
};
