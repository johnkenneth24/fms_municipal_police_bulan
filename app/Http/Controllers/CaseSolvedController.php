<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseSolvedController extends Controller
{
    public function index()
    {
        return view('modules.case-solved.index');
    }}
