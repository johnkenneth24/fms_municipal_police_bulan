<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuspectController extends Controller
{
    public function index()
    {
        return view('modules.suspect.index');
    }
}
