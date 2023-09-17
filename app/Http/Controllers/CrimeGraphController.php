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

        $unharmed = CrimeRecord::whereYear('date_committed', $year)->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Unharmed');
        })->count();
        $harmed = CrimeRecord::whereYear('date_committed', $year)->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Harmed');
        })->count();
        $wounded = CrimeRecord::whereYear('date_committed', $year)->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Wounded');
        })->count();
        $killed = CrimeRecord::whereYear('date_committed', $year)->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Killed');
        })->count();
        $deceased = CrimeRecord::whereYear('date_committed', $year)->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Deceased');
        })->count();

        $arrested = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Arrested');
        })->count();
        $onbail = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'On-bail');
        })->count();
        $atLarge = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'At-large');
        })->count();
        $released = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Released');
        })->count();
        $deceased_suspect = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Deceased');
        })->count();
        $onprobation = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'On Probation');
        })->count();
        $convicted = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Convicted');
        })->count();
        $serving_sentence = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Serving Sentence');
        })->count();
        $turnoverMswd = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Turn-over to MSWD');
        })->count();
        $turnoverBrgy = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Turn-over to Barangay');
        })->count();
        $turnoverParent = CrimeRecord::whereYear('date_committed', $year)->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Turn-over to Parents/Legal Guardian');
        })->count();

        $attempted = CrimeRecord::where('stage_of_felony', 'Attempted')->whereYear('date_committed', $year)->count();
        $frustrated = CrimeRecord::where('stage_of_felony', 'Frustrated')->whereYear('date_committed', $year)->count();
        $consummated = CrimeRecord::where('stage_of_felony', 'Consummated')->whereYear('date_committed', $year)->count();

        $murder = CrimeRecord::where('crime_category', 'Murder')->whereYear('date_committed', $year)->count();
        $homicide = CrimeRecord::where('crime_category', 'Homicide')->whereYear('date_committed', $year)->count();
        $physicalInjury = CrimeRecord::where('crime_category', 'Physical Injury')->whereYear('date_committed', $year)->count();
        $rape = CrimeRecord::where('crime_category', 'Rape')->whereYear('date_committed', $year)->count();
        $robbery = CrimeRecord::where('crime_category', 'Robbery')->whereYear('date_committed', $year)->count();
        $carnapping = CrimeRecord::where('crime_category', 'Carnapping')->whereYear('date_committed', $year)->count();
        $theft = CrimeRecord::where('crime_category', 'Theft')->whereYear('date_committed', $year)->count();

        $repAct = CrimeRecord::where('crime_category', 'Republic Act')->whereYear('date_committed', $year)->count();
        $presDecree = CrimeRecord::where('crime_category', 'President Decrees')->whereYear('date_committed', $year)->count();
        $batas = CrimeRecord::where('crime_category', 'Batas Pambansa')->whereYear('date_committed', $year)->count();
        $offensePenal = CrimeRecord::where('crime_category', 'Offense of Revise Penal Code not Categorized as Index')->whereYear('date_committed', $year)->count();

        $rirHomi = CrimeRecord::where('crime_category', 'RIR to Homicide')->whereYear('date_committed', $year)->count();
        $rirPhysicalInj = CrimeRecord::where('crime_category', 'RIR to Physical Injury')->whereYear('date_committed', $year)->count();
        $rirDamage = CrimeRecord::where('crime_category', 'RIR Damage to Property')->whereYear('date_committed', $year)->count();
        $quasiOffense = CrimeRecord::where('crime_category', 'Other Quasi Offenses')->whereYear('date_committed', $year)->count();
        $imprudence = CrimeRecord::where('crime_category', 'Imprudence & Negligence')->whereYear('date_committed', $year)->count();



        return response()->json([
            'rirHomi'  => $rirHomi,
            'rirPhysicalInj' => $rirPhysicalInj,
            'rirDamage' => $rirDamage,
            'quasiOffense' => $quasiOffense,
            'imprudence' => $imprudence,
            'repAct' => $repAct,
            'presDecree' => $presDecree,
            'batas' => $batas,
            'offensePenal' => $offensePenal,
            'murder' => $murder,
            'homicide' => $homicide,
            'physicalInjury' => $physicalInjury,
            'rape' => $rape,
            'robbery' => $robbery,
            'carnapping' => $carnapping,
            'theft' => $theft,
            'attempted' => $attempted,
            'frustrated' => $frustrated,
            'consummated' => $consummated,
            'arrested' => $arrested,
            'onbail' => $onbail,
            'atLarge' => $atLarge,
            'released'=>$released,
            'deceased_suspect' => $deceased_suspect,
            'convicted'=>  $convicted,
            'onprobation'=> $onprobation,
            'serving_sentence' => $serving_sentence,
            'turnoverMswd' => $turnoverMswd,
            'turnoverBrgy' => $turnoverBrgy,
            'turnoverParent' => $turnoverParent,
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
            'countFemaleVic' => $victimFemale,
            'unharmed' => $unharmed,
            'harmed' => $harmed,
            'wounded' => $wounded,
            'killed' => $killed,
            'deceased' => $deceased
        ]);
    }
}
