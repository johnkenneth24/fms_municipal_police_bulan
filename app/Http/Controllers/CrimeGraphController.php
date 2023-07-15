<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrimeGraphController extends Controller
{
    public function index()
    {
        return view('modules.crime-infograph.index');
    }
}
