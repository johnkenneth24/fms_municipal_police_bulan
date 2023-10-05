<?php

namespace App\Http\Requests\CrimeRecord;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [

            'blotter_entry_no' => 'required',
            'case_status' => 'required',
            'case_progress' => 'required',
            'date_committed' => 'required',
            'time_committed' => 'required',
            'date_reported' => 'required',
            'time_reported' => 'required',
            'incident_location' => 'required',
            'incident_details' => 'required',
            'investigator' => 'required',
            'stage_of_felony' => 'required',
            'crime_category' => 'required',
            'crime_committed' => 'required',

            'v_firstname' => 'required',
            'v_middlename' => 'nullable',
            'v_lastname' => 'required',
            'v_suffix' => 'nullable',
            'v_birthdate' => 'required',
            'v_age' => 'required',
            'v_birthplace' => 'required',
            'v_gender' => 'required',
            'v_marital_status' => 'required',
            'v_occupation' => 'nullable',
            'v_education' => 'nullable',
            'v_citizenship' => 'required',
            'v_address' => 'required',
            'v_contact_number' => 'nullable',
            'v_ethnic' => 'nullable',
            'relation_to_suspect' => 'nullable',
            'victim_status' => 'required',

            's_firstname' => 'nullable',
            's_middlename' => 'nullable',
            's_lastname' => 'nullable',
            's_suffix' => 'nullable',
            's_birthdate' => 'nullable',
            's_age' => 'nullable',
            's_birthplace' => 'nullable',
            's_gender' => 'nullable',
            's_marital_status' => 'nullable',
            's_occupation' => 'nullable',
            's_education' => 'nullable',
            's_citizenship' => 'nullable',
            's_contact_number' => 'nullable',
            's_address' => 'nullable',
            // 's_ethnic' => 'nullable',
            'used_weapon' => 'nullable',
            'relation_to_victim' => 'nullable',
            'suspect_status' => 'nullable',
            'suspect_motive' => 'nullable',
        ];
    }
}
