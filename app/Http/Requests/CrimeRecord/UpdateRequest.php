<?php

namespace App\Http\Requests\CrimeRecord;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

            's_firstname' => 'required',
            's_middlename' => 'nullable',
            's_lastname' => 'required',
            's_suffix' => 'nullable',
            's_birthdate' => 'required',
            's_age' => 'required',
            's_birthplace' => 'required',
            's_gender' => 'required',
            's_marital_status' => 'required',
            's_occupation' => 'nullable',
            's_education' => 'nullable',
            's_citizenship' => 'required',
            's_contact_number' => 'nullable',
            's_address' => 'required',
            // 's_ethnic' => 'nullable',
            'used_weapon' => 'required',
            'relation_to_victim' => 'nullable',
            'suspect_status' => 'required',
            'suspect_motive' => 'nullable',
        ];
    }
}
