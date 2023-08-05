<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrimeRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'blotter_entry_no',
        'case_status',
        'case_progress',
        'date_committed',
        'time_committed',
        'date_reported',
        'time_reported',
        'incident_location',
        'incident_details',
        'investigator',
        'stage_of_felony',
        'crime_category',
        'crime_committed',
    ];

    protected $casts = [
        'date_committed' => 'date',
        'date_reported' => 'date',
    ];

    public function victim()
    {
        return $this->hasOne(Victim::class, 'crime_record_id');
    }

    public function suspect()
    {
        return $this->hasOne(Suspect::class, 'crime_record_id');
    }
}
