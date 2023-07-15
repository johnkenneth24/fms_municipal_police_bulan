<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseInvestController extends Controller
{
    public function index()
    {
        return view('modules.case-invest.index');
    }}
