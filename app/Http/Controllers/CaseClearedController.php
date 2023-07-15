<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseClearedController extends Controller
{
    public function index()
    {
        return view('modules.case-clear.index');
    }
}
