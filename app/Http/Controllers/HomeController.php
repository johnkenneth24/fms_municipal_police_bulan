<?php

namespace App\Http\Controllers;

use App\Models\CrimeRecord;

class HomeController extends Controller
{
    public function home()
    {

        return view('dashboard');
    }
}
