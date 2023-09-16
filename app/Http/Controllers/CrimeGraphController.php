<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrimeRecord;
use Carbon\Carbon;
use App\Models\Suspect;

class CrimeGraphController extends Controller
{
    public function index()
    {$latestDate = CrimeRecord::max('date_committed');
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
        return view('modules.crime-infograph.index', $caseData);
    }

    public function getYearCount(Request $request)
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

        $suspectMale = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('gender', 'male');
        })->count();

        $suspectFemale = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('gender', 'female');
        })->count();


        $victimMale = CrimeRecord::whereYear('date_committed', $year)->whereHas('victim', function ($query) {
            $query->where('gender', 'male');
        })->count();

        $victimFemale = CrimeRecord::whereYear('date_committed', $year)->whereHas('victim', function ($query) {
            $query->where('gender', 'female');
        })->count();

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
            'prosec' => $prosecutor,
            'filed' => $filedCourt,
            'law' => $lawAgency,
            'dismnissed' => $dismissed,
            'countMaleSus' => $suspectMale,
            'countFemaleSus' => $suspectFemale,
            'countMaleVic' => $victimMale,
            'countFemaleVic' => $victimFemale
        ]);
    }
}
