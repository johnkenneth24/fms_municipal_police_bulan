<?php

namespace App\Http\Controllers;

use App\Models\CrimeRecord;
use Illuminate\Http\Request;

class CaseSolvedController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = CrimeRecord::query()->with(['victim', 'suspect'])->where('case_status', 'Solved')->orderBy('blotter_entry_no', 'asc');

        if ($search) {
            $query->where('blotter_entry_no', 'like', '%' . $search . '%')
                ->orWhere('case_status', 'like', '%' . $search . '%')
                ->orWhere('case_progress', 'like', '%' . $search . '%')
                ->orWhere('date_reported', 'like', '%' . $search . '%')
                ->orWhere('incident_location', 'like', '%' . $search . '%')
                ->orWhere('stage_of_felony', 'like', '%' . $search . '%')
                ->orWhere('crime_category', 'like', '%' . $search . '%')
                ->orWhere('date_committed', 'like', '%' . $search . '%')
                ->orWhereHas('victim', function ($query) use ($search) {
                    $query->where('firstname', 'like', '%' . $search . '%')
                        ->orWhere('lastname', 'like', '%' . $search . '%')
                        ->orWhere('victim_status', 'like', '%' . $search . '%');
                    // Add more conditions for victim model columns as needed
                })
                ->orWhereHas('suspect', function ($query) use ($search) {
                    $query->where('firstname', 'like', '%' . $search . '%')
                        ->orWhere('lastname', 'like', '%' . $search . '%')
                        ->orWhere('suspect_status', 'like', '%' . $search . '%')
                        ->orWhere('used_weapon', 'like', '%' . $search . '%');
                    // Add more conditions for suspect model columns as needed
                })
            ;
        }

        $crime_records = $query->paginate(10);

        return view('modules.case-solved.index', compact('crime_records'));
    }}
