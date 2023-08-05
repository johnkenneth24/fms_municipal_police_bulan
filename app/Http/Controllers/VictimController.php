<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Victim::query()->with('crimeRecord')->orderBy('lastname', 'asc');

        if ($search) {
            $query->where('firstname', 'like', '%' . $search . '%')
                ->orWhere('middlename', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('gender', 'like', '%' . $search . '%');
        }

        $victims = $query->paginate(10);

        return view('modules.victim.index', compact('victims'));
    }
}
