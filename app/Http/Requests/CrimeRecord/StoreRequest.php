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

            // 's_firstname' => 'required',
        ];
    }
}
