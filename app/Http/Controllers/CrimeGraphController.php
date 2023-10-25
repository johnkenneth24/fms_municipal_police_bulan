<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrimeRecord;
use Carbon\Carbon;
use App\Models\Suspect;

class CrimeGraphController extends Controller
{
    public function index()
    {
        $latestDate = CrimeRecord::max('date_committed');
        $oldestDate = CrimeRecord::min('date_committed');

        // Convert to Carbon instance and then format to get the year
        $latestYear = Carbon::parse($latestDate)->format('Y');
        $oldestYear = Carbon::parse($oldestDate)->format('Y');

        $caseSolved = CrimeRecord::where('case_status', 'Solved')->count();
        $caseCleared = CrimeRecord::where('case_status', 'Cleared')->count();
        $caseUnderInvestigation = CrimeRecord::where('case_status', 'Under Investigation')->count();

        return view('modules.crime-infograph.index', compact('latestYear', 'oldestYear', 'caseSolved', 'caseCleared', 'caseUnderInvestigation'));
    }

    public function getYearCount(Request $request)
    {
        $fromDate = $request->input('from');
        $toDate = $request->input('to');

        $from = \DateTime::createFromFormat('Y-m-d', $fromDate)->format('Y-m-d');
        $to = \DateTime::createFromFormat('Y-m-d', $toDate)->format('Y-m-d');
        $fromYear = \DateTime::createFromFormat('Y-m-d', $fromDate)->format('Y');


        $janCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 1)
            ->count();
        $febCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 2)
            ->count();
        $marCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 3)
            ->count();
        $aprCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 4)
            ->count();
        $mayCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 5)
            ->count();
        $junCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 6)
            ->count();
        $julCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 7)
            ->count();
        $augCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 8)
            ->count();
        $septCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 9)
            ->count();
        $octCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 10)
            ->count();
        $novCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 11)
            ->count();
        $decCount = CrimeRecord::whereYear('date_committed', $from)
            ->whereMonth('date_committed', 12)
            ->count();

        $solvedCase = CrimeRecord::whereBetween('date_committed', [$from, $to])->where('case_status', 'Solved')->count();
        $clearedCase = CrimeRecord::whereBetween('date_committed', [$from, $to])->where('case_status', 'Cleared')->count();
        $underInvCase = CrimeRecord::whereBetween('date_committed', [$from, $to])->where('case_status', 'Under Investigation')->count();

        $prosecutor = CrimeRecord::whereBetween('date_committed', [$from, $to])->where('case_progress', 'Referred to Prosecutor')->count();
        $filedCourt = CrimeRecord::whereBetween('date_committed', [$from, $to])->where('case_progress', 'Filed in Court')->count();
        $lawAgency = CrimeRecord::whereBetween('date_committed', [$from, $to])->where('case_progress', 'Referred to other Law Enforcement Agency')->count();
        $dismissed = CrimeRecord::whereBetween('date_committed', [$from, $to])->where('case_progress', 'Dismissed')->count();

        $suspectMale = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('gender', 'male');
        })->count();
        $suspectFemale = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('gender', 'female');
        })->count();

        $victimMale = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('victim', function ($query) {
            $query->where('gender', 'male');
        })->count();
        $victimFemale = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('victim', function ($query) {
            $query->where('gender', 'female');
        })->count();

        $unharmed = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Unharmed');
        })->count();
        $harmed = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Harmed');
        })->count();
        $wounded = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Wounded');
        })->count();
        $killed = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Killed');
        })->count();
        $deceased = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('victim', function ($query) {
            $query->where('victim_status', 'Deceased');
        })->count();

        $arrested = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Arrested');
        })->count();
        $onbail = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'On-bail');
        })->count();
        $atLarge = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'At-large');
        })->count();
        $released = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Released');
        })->count();
        $deceased_suspect = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Deceased');
        })->count();
        $onprobation = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'On Probation');
        })->count();
        $convicted = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Convicted');
        })->count();
        $serving_sentence = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Serving Sentence');
        })->count();
        $turnoverMswd = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Turn-over to MSWD');
        })->count();
        $turnoverBrgy = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Turn-over to Barangay');
        })->count();
        $turnoverParent = CrimeRecord::whereBetween('date_committed', [$from, $to])->whereHas('suspect', function ($query) {
            $query->where('suspect_status', 'Turn-over to Parents/Legal Guardian');
        })->count();

        $attempted = CrimeRecord::where('stage_of_felony', 'Attempted')->whereBetween('date_committed', [$from, $to])->count();
        $frustrated = CrimeRecord::where('stage_of_felony', 'Frustrated')->whereBetween('date_committed', [$from, $to])->count();
        $consummated = CrimeRecord::where('stage_of_felony', 'Consummated')->whereBetween('date_committed', [$from, $to])->count();

        $murder = CrimeRecord::where('crime_category', 'Murder')->whereBetween('date_committed', [$from, $to])->count();
        $homicide = CrimeRecord::where('crime_category', 'Homicide')->whereBetween('date_committed', [$from, $to])->count();
        $physicalInjury = CrimeRecord::where('crime_category', 'Physical Injury')->whereBetween('date_committed', [$from, $to])->count();
        $rape = CrimeRecord::where('crime_category', 'Rape')->whereBetween('date_committed', [$from, $to])->count();
        $robbery = CrimeRecord::where('crime_category', 'Robbery')->whereBetween('date_committed', [$from, $to])->count();
        $carnapping = CrimeRecord::where('crime_category', 'Carnapping')->whereBetween('date_committed', [$from, $to])->count();
        $theft = CrimeRecord::where('crime_category', 'Theft')->whereBetween('date_committed', [$from, $to])->count();

        $repAct = CrimeRecord::where('crime_category', 'Republic Act')->whereBetween('date_committed', [$from, $to])->count();
        $presDecree = CrimeRecord::where('crime_category', 'President Decrees')->whereBetween('date_committed', [$from, $to])->count();
        $batas = CrimeRecord::where('crime_category', 'Batas Pambansa')->whereBetween('date_committed', [$from, $to])->count();
        $offensePenal = CrimeRecord::where('crime_category', 'Offense of Revise Penal Code not Categorized as Index')->whereBetween('date_committed', [$from, $to])->count();

        $rirHomi = CrimeRecord::where('crime_category', 'RIR to Homicide')->whereBetween('date_committed', [$from, $to])->count();
        $rirPhysicalInj = CrimeRecord::where('crime_category', 'RIR to Physical Injury')->whereBetween('date_committed', [$from, $to])->count();
        $rirDamage = CrimeRecord::where('crime_category', 'RIR Damage to Property')->whereBetween('date_committed', [$from, $to])->count();
        $quasiOffense = CrimeRecord::where('crime_category', 'Other Quasi Offenses')->whereBetween('date_committed', [$from, $to])->count();
        $imprudence = CrimeRecord::where('crime_category', 'Imprudence & Negligence')->whereBetween('date_committed', [$from, $to])->count();



        return response()->json([
            'rirHomi'  => $rirHomi,
            'fromYear' => $fromYear,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
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
            'released' => $released,
            'deceased_suspect' => $deceased_suspect,
            'convicted' =>  $convicted,
            'onprobation' => $onprobation,
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
