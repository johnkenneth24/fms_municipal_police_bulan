<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VictimController extends Controller
{
    public function index()
    {
        return view('modules.victim.index');
    }
}
