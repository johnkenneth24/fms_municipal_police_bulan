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
        return view('modules.crime-record.create');
    }
}
