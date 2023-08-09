<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrimeRecord\StoreRequest;
use App\Http\Requests\CrimeRecord\UpdateRequest;
use App\Models\CrimeRecord;
use App\Models\Suspect;
use App\Models\Victim;
use Illuminate\Http\Request;

class CrimeRecordController extends Controller
{
    public $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV', 'V'];
    public $mar_status = ['Single', 'Married', 'Separated', 'Widowed', 'Divorced'];
    public $vic_status = ['Unharmed', 'Harmed', 'Wounded', 'Killed', 'Deceased'];
    public $sus_status = ['Arrested', 'On-bail', 'At-large', 'Released', 'Deceased', 'On Probation', 'Convicted', 'Serving Sentence', 'Turned-over to MSWD', 'Turned-over to Barangay', 'Turned-over to Parents/Legal Guardian'];
    public $used_weapons = ['Firearms', 'Bladed Weapon', 'Blunt Object', 'Explosive', 'Poison', 'Chemical', 'Hand|Fist|Feet', 'Others'];
    public $case_status = ['Solved', 'Cleared', 'Under Investigation'];
    public $case_progress = ['Referred to Prosecutor', 'Filed in Court', 'Referred to other Law Enforcement Agency', 'Dismissed'];
    public $stage_felony = ['Attempted', 'Frustrated', 'Consummated'];
    public $crime_category = [
        "Index Crimes" => [
            'Murder' => 'Murder',
            'Homicide' => 'Homicide',
            'Physical Injury' => 'Physical Injury',
            'Rape' => 'Rape',
            'Robbery' => 'Robbery',
            'Carnapping' => 'Carnapping',
            'Theft' => 'Theft',
        ],
        "Non-Index Crimes" => [
            'sample 1' => 'Sample 1',
            'sample 2' => 'Sample 2',
        ],
    ];

    public $barangay = [
        "A. Bonifacio", "Abad Santos", "Aguinaldo", "Antipolo", "Beguin", "Benigno S. Aquino", "Bical", "Bonga", "Butag", "Cadandanan", "Calomagon", "Calpi", "Cocok-Cabitan", "Daganas",  "Danao", "Dolos", "E. Quirino", "Fabrica",  "G. del Pilar",  "Gate", "Inararan", "J. Gerona", "J. P. Laurel", "Jamorawon", "Lajong", "Libertad", "M. Roxas", "Magsaysay", "Managanaga", "Marinab", "Montecalvario", "N. Roque", "Namo", "Nasuje", "Obrero", "Osmeña", "Otavi", "Padre Diaz",  "Palale",  "Quezon", "R. Gerona", "Recto", "Sagrada", "San Francisco", "San Isidro", "San Juan Bag-o", "San Juan Daan", "San Rafael", "San Ramon", "San Vicente", "Santa Remedios", "Santa Teresita", "Sigad", "Somagongsong", "Taromata", "Zone I Poblacion", "Zone II Poblacion", "Zone III Poblacion", "Zone IV Poblacion", "Zone V Poblacion", "Zone VI Poblacion", "Zone VII Poblacion", "Zone VIII Poblacion"
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = CrimeRecord::query()->with(['victim', 'suspect'])->orderBy('blotter_entry_no', 'asc');

        if ($search) {
            $query->where('blotter_entry_no', 'like', '%' . $search . '%')
                ->orWhere('case_status', 'like', '%' . $search . '%')
                ->orWhere('case_progress', 'like', '%' . $search . '%')
                ->orWhere('date_reported', 'like', '%' . $search . '%')
                ->orWhere('incident_location', 'like', '%' . $search . '%')
                ->orWhere('stage_of_felony', 'like', '%' . $search . '%')
                ->orWhere('crime_category', 'like', '%' . $search . '%')
                ->orWhere('date_committed', 'like', '%' . $search . '%');
        }

        $crime_records = $query->paginate(10);


        return view('modules.crime-record.index', compact('crime_records'));
    }

    public function create()
    {
        $suffixes = $this->suffixes;
        $mar_status = $this->mar_status;
        $vic_status = $this->vic_status;
        $sus_status = $this->sus_status;
        $used_weapons = $this->used_weapons;
        $case_status = $this->case_status;
        $case_progress = $this->case_progress;
        $stage_felony = $this->stage_felony;
        $crime_category = $this->crime_category;
        $barangays = $this->barangay;

        $latestBlotterNo = CrimeRecord::latest()->first('blotter_entry_no');
        $latestBlotterNo = $latestBlotterNo ? $latestBlotterNo->blotter_entry_no + 1 : 1;
        $latestBlotterNo = str_pad($latestBlotterNo, 4, '0', STR_PAD_LEFT);

        return view('modules.crime-record.create', compact('suffixes', 'barangays', 'mar_status', 'vic_status', 'sus_status', 'used_weapons', 'case_status', 'case_progress', 'stage_felony', 'crime_category', 'latestBlotterNo'));
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);

        $crime_record = CrimeRecord::create([
            'blotter_entry_no' => $validated['blotter_entry_no'],
            'case_status' => $validated['case_status'],
            'case_progress' => $validated['case_progress'],
            'date_committed' => $validated['date_committed'],
            'time_committed' => $validated['time_committed'],
            'date_reported' => $validated['date_reported'],
            'time_reported' => $validated['time_reported'],
            'incident_location' => $validated['incident_location'],
            'incident_details' => $validated['incident_details'],

            'investigator' => $validated['investigator'],
            'stage_of_felony' => $validated['stage_of_felony'],
            'crime_category' => $validated['crime_category'],
            'crime_committed' => $validated['crime_committed'],
        ]);

        $victim = Victim::create([
            'crime_record_id' => $crime_record->id,
            'firstname' => $validated['v_firstname'],
            'middlename' => $validated['v_middlename'],
            'lastname' => $validated['v_lastname'],
            'suffix' => $validated['v_suffix'],
            'birthdate' => $validated['v_birthdate'],
            'birthplace' => $validated['v_birthplace'],
            'gender' => $validated['v_gender'],
            'marital_status' => $validated['v_marital_status'],
            'occupation' => $validated['v_occupation'],
            'education' => $validated['v_education'],
            'citizenship' => $validated['v_citizenship'],
            'address' => $validated['v_address'],
            'contact_number' => $validated['v_contact_number'],
            'ethnic' => $validated['v_ethnic'] ?? 'none',
            'relation_to_suspect' => $validated['relation_to_suspect'],
            'victim_status' => $validated['victim_status'],
        ]);

        $suspect = Suspect::create([
            'crime_record_id' => $crime_record->id,
            'firstname' => $validated['s_firstname'],
            'middlename' => $validated['s_middlename'],
            'lastname' => $validated['s_lastname'],
            'suffix' => $validated['s_suffix'],
            'birthdate' => $validated['s_birthdate'],
            'birthplace' => $validated['s_birthplace'],
            'gender' => $validated['s_gender'],
            'marital_status' => $validated['s_marital_status'],
            'occupation' => $validated['s_occupation'],
            'education' => $validated['s_education'],
            'citizenship' => $validated['s_citizenship'],
            'address' => $validated['s_address'],
            'contact_number' => $validated['s_contact_number'],
            'relation_to_victim' => $validated['relation_to_victim'],
            'used_weapon' => $validated['used_weapon'],
            'suspect_status' => $validated['suspect_status'],
            'suspect_motive' => $validated['suspect_motive'],
        ]);

        return redirect()->route('crime-record.index')->with('success', 'Crime Record created successfully');
    }

    public function edit( CrimeRecord $crime_record)
    {
        $suffixes = $this->suffixes;
        $mar_status = $this->mar_status;
        $vic_status = $this->vic_status;
        $sus_status = $this->sus_status;
        $used_weapons = $this->used_weapons;
        $case_status = $this->case_status;
        $case_progress = $this->case_progress;
        $stage_felony = $this->stage_felony;
        $crime_category = $this->crime_category;
        $barangays = $this->barangay;

        //get age
        $v_age = $crime_record->victim->birthdate->diffInYears(now());

        // dd($v_age);

        return view('modules.crime-record.edit', compact('v_age', 'suffixes', 'barangays', 'mar_status', 'vic_status', 'sus_status', 'used_weapons', 'case_status', 'case_progress', 'stage_felony', 'crime_category', 'crime_record'));
    }

    public function update(UpdateRequest $request, $crime_record)
{
    $validated = $request->validated();
    // dd($validated);

    // Find the existing CrimeRecord instance by ID
    $crime_record = CrimeRecord::findOrFail($crime_record);

    $crime_record->update([
        'blotter_entry_no' => $validated['blotter_entry_no'],
        'case_status' => $validated['case_status'],
        'case_progress' => $validated['case_progress'],
        'date_committed' => $validated['date_committed'],
        'time_committed' => $validated['time_committed'],
        'date_reported' => $validated['date_reported'],
        'time_reported' => $validated['time_reported'],
        'incident_location' => $validated['incident_location'],
        'incident_details' => $validated['incident_details'],
        'investigator' => $validated['investigator'],
        'stage_of_felony' => $validated['stage_of_felony'],
        'crime_category' => $validated['crime_category'],
        'crime_committed' => $validated['crime_committed'],
    ]);

    // Find the Victim instance related to the CrimeRecord or create a new one if not found
    $victim = Victim::updateOrCreate(['crime_record_id' => $crime_record->id], [
        'firstname' => $validated['v_firstname'],
        'middlename' => $validated['v_middlename'],
        'lastname' => $validated['v_lastname'],
        'suffix' => $validated['v_suffix'],
        'birthdate' => $validated['v_birthdate'],
        'birthplace' => $validated['v_birthplace'],
        'gender' => $validated['v_gender'],
        'marital_status' => $validated['v_marital_status'],
        'occupation' => $validated['v_occupation'],
        'education' => $validated['v_education'],
        'citizenship' => $validated['v_citizenship'],
        'address' => $validated['v_address'],
        'contact_number' => $validated['v_contact_number'],
        'ethnic' => $validated['v_ethnic'] ?? 'none',
        'relation_to_suspect' => $validated['relation_to_suspect'],
        'victim_status' => $validated['victim_status'],
    ]);

    // Find the Suspect instance related to the CrimeRecord or create a new one if not found
    $suspect = Suspect::updateOrCreate(['crime_record_id' => $crime_record->id], [
        'firstname' => $validated['s_firstname'],
        'middlename' => $validated['s_middlename'],
        'lastname' => $validated['s_lastname'],
        'suffix' => $validated['s_suffix'],
        'birthdate' => $validated['s_birthdate'],
        'birthplace' => $validated['s_birthplace'],
        'gender' => $validated['s_gender'],
        'marital_status' => $validated['s_marital_status'],
        'occupation' => $validated['s_occupation'],
        'education' => $validated['s_education'],
        'citizenship' => $validated['s_citizenship'],
        'address' => $validated['s_address'],
        // 'ethnic' => $validated['s_ethnic'] ?? 'none',
        'relation_to_victim' => $validated['relation_to_victim'],
        'used_weapon' => $validated['used_weapon'],
        'suspect_status' => $validated['suspect_status'],
        'suspect_motive' => $validated['suspect_motive'],
    ]);

    return view('modules.crime-record.index')->with('success', 'Crime record successfully updated!');
}

}
