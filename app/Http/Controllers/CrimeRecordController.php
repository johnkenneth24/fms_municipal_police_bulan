<?php

namespace App\Http\Controllers;

class CrimeRecordController extends Controller
{
    public function index()
    {
        return view('modules.crime-record.index');
    }

    public function create()
    {
        $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV', 'V'];
        $mar_status = ['Single', 'Married', 'Separated', 'Widowed', 'Divorced'];
        $vic_status = ['Unharmed', 'Harmed', 'Wounded', 'Killed', 'Deceased'];

        return view('modules.crime-record.create', compact('suffixes', 'mar_status', 'vic_status'));
    }
}
