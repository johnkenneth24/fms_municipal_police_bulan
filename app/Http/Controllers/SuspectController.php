<?php

namespace App\Http\Controllers;

use App\Models\Suspect;
use Illuminate\Http\Request;

class SuspectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Suspect::query()->with('crimeRecord')->orderBy('lastname', 'asc');

        if ($search) {
            $query->where('firstname', 'like', '%' . $search . '%')
                ->orWhere('middlename', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('gender', 'like', '%' . $search . '%');
        }

        $suspects = $query->paginate(10);

        return view('modules.suspect.index', compact('suspects'));
    }
}
