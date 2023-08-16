<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suspect extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'crime_record_id',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'birthdate',
        'birthplace',
        'gender',
        'marital_status',
        'occupation',
        'education',
        'citizenship',
        'address',
        'contact_number',
        'relation_to_victim',
        'used_weapon',
        'suspect_status',
        'suspect_motive',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    protected $dates = [
        'birthdate',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function crimeRecord()
    {
        return $this->belongsTo(CrimeRecord::class);
    }
}
