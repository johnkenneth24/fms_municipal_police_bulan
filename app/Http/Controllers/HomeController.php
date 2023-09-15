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

        $caseData = [
            'latestYear' => $latestYear,
            'oldestYear' => $oldestYear,
            'caseSolved' => CrimeRecord::where('case_status', 'Solved')->count(),
            'caseCleared' => CrimeRecord::where('case_status', 'Cleared')->count(),
            'caseUnderInvestigation' => CrimeRecord::where('case_status', 'Under Investigation')->count(),
        ];


        return view('dashboard', $caseData);
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
            'decCount' => $decCount
        ]);
    }
}
