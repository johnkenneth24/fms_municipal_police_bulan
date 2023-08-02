<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrimeRecord\StoreRequest;
use App\Models\Victim;

class CrimeRecordController extends Controller
{
    public function index()
    {

        return view('modules.crime-record.index');
    }

    public function create()
    {
        $suffixes = ['Jr.', 'Sr.', 'I', 'II', 'III', 'IV', 'V'];
        $mar_status = ['Single', 'Married', 'Separated', 'Widowed', 'Divorced'];
        $vic_status = ['Unharmed', 'Harmed', 'Wounded', 'Killed', 'Deceased'];

        $sus_status = ['Arrested', 'On-bail', 'At-large', 'Released', 'Deceased', 'On Probation', 'Convicted', 'Serving Sentence', 'Turned-over to MSWD', 'Turned-over to Barangay', 'Turned-over to Parents/Legal Guardian'];
        $used_weapons = ['Firearms', 'Bladed Weapon', 'Blunt Object', 'Explosive', 'Poison', 'Chemical', 'Hand|Fist|Feet', 'Others'];

        return view('modules.crime-record.create', compact('suffixes', 'mar_status', 'vic_status', 'sus_status', 'used_weapons'));
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        // dd($validated);

        $victim = Victim::create([
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

        return view('modules.crime-record.index')->with('success', 'Crime record successfully created!');
    }
}
