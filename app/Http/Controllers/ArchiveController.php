<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CrimeRecord;

class ArchiveController extends Controller
{

    public function index()
    {
        $crime_records = CrimeRecord::withTrashed()->paginate(10);

        return view('modules.archive.index', compact('crime_records'));
    }
}
