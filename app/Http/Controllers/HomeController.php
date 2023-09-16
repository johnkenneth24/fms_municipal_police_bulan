<?php

namespace App\Http\Controllers;

use App\Models\CrimeRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home(Request $request)
    {

        $latestDate = CrimeRecord::max('date_committed');
        $oldestDate = CrimeRecord::min('date_committed');

        // Convert to Carbon instance and then format to get the year
        $latestYear = Carbon::parse($latestDate)->format('Y');
        $oldestYear = Carbon::parse($oldestDate)->format('Y');

        $year = now()->format('Y');

        $janCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 1)
            ->count();

        $febCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 2)
            ->count();

        $marCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 3)
            ->count();

        $aprCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 4)
            ->count();

        $mayCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 5)
            ->count();

        $junCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 6)
            ->count();

        $julCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 7)
            ->count();

        $augCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 8)
            ->count();

        $septCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 9)
            ->count();

        $octCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 10)
            ->count();

        $novCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 11)
            ->count();

        $decCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 12)
            ->count();

        $solvedCase = CrimeRecord::where('case_status', 'Solved')->whereYear('date_committed', $year)->count();
        $clearedCase = CrimeRecord::where('case_status', 'Cleared')->whereYear('date_committed', $year)->count();
        $underInvCase = CrimeRecord::where('case_status', 'Under Investigation')->whereYear('date_committed', $year)->count();

        $prosecutor = CrimeRecord::where('case_progress', 'Referred to Prosecutor')->whereYear('date_committed', $year)->count();
        $filedCourt = CrimeRecord::where('case_progress', 'Filed in Court')->whereYear('date_committed', $year)->count();
        $lawAgency = CrimeRecord::where('case_progress', 'Referred to other Law Enforcement Agency')->whereYear('date_committed', $year)->count();
        $dismissed = CrimeRecord::where('case_progress', 'Dismissed')->whereYear('date_committed', $year)->count();

        return view('dashboard', compact('prosecutor', 'filedCourt', 'lawAgency', 'dismissed', 'latestYear', 'oldestYear', 'janCount', 'febCount', 'marCount', 'aprCount', 'mayCount', 'junCount', 'julCount', 'augCount', 'septCount', 'octCount', 'novCount', 'decCount', 'solvedCase', 'clearedCase', 'underInvCase'));

    }

    public function getMonthCount(Request $request)
    {
        $year = $request->input('year');

        $janCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 1)
            ->count();

        $febCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 2)
            ->count();

        $marCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 3)
            ->count();

        $aprCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 4)
            ->count();

        $mayCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 5)
            ->count();

        $junCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 6)
            ->count();

        $julCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 7)
            ->count();

        $augCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 8)
            ->count();

        $septCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 9)
            ->count();

        $octCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 10)
            ->count();

        $novCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 11)
            ->count();

        $decCount = CrimeRecord::whereYear('date_committed', $year)
            ->whereMonth('date_committed', 12)
            ->count();

        $solvedCase = CrimeRecord::where('case_status', 'Solved')->whereYear('date_committed', $year)->count();
        $clearedCase = CrimeRecord::where('case_status', 'Cleared')->whereYear('date_committed', $year)->count();
        $underInvCase = CrimeRecord::where('case_status', 'Under Investigation')->whereYear('date_committed', $year)->count();

        $prosecutor = CrimeRecord::where('case_progress', 'Referred to Prosecutor')->whereYear('date_committed', $year)->count();
        $filedCourt = CrimeRecord::where('case_progress', 'Filed in Court')->whereYear('date_committed', $year)->count();
        $lawAgency = CrimeRecord::where('case_progress', 'Referred to other Law Enforcement Agency')->whereYear('date_committed', $year)->count();
        $dismissed = CrimeRecord::where('case_progress', 'Dismissed')->whereYear('date_committed', $year)->count();

        return response()->json([
            'janCount' => $janCount,
            'febCount' => $febCount,
            'marCount' => $marCount,
            'aprCount' => $aprCount,
            'mayCount' => $mayCount,
            'junCount' => $junCount,
            'julCount' => $julCount,
            'augCount' => $augCount,
            'septCount' => $septCount,
            'octCount' => $octCount,
            'novCount' => $novCount,
            'decCount' => $decCount,
            'solvedCase' => $solvedCase,
            'clearedCase' => $clearedCase,
            'underInvCase' => $underInvCase,
        ]);
    }

}
