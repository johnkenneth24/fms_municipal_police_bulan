<?php

namespace App\Http\Livewire\CrimeRec;

use Livewire\Component;
use App\Models\CrimeRecord;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{
    public $path_export = 'docx/incident-report.docx';
    public $crime_record;

    public function export()
    {
        $path = storage_path($this->path_export);
        $templateProcessor = new TemplateProcessor($path);

        //get age victim
        $v_age = date_diff(date_create($this->crime_record->victim->birthdate), date_create('now'))->y;
        //get age suspect
        $s_age = date_diff(date_create($this->crime_record->suspect->birthdate), date_create('now'))->y;

        $templateProcessor->setValue('blotter_no', 'BMPS-' . $this->crime_record->blotter_entry_no);
        $templateProcessor->setValue('case_stat', $this->crime_record->case_status);
        $templateProcessor->setValue('case_prog', $this->crime_record->case_progress);
        $templateProcessor->setValue('date_comm', $this->crime_record->date_committed->format('F d, Y'));
        $templateProcessor->setValue('time_comm', $this->crime_record->time_committed->format('h:i a'));
        $templateProcessor->setValue('date_rep', $this->crime_record->date_reported->format('F d, Y'));
        $templateProcessor->setValue('time_rep', $this->crime_record->time_reported->format('h:i a'));
        $templateProcessor->setValue('place_incident', $this->crime_record->incident_location);
        $templateProcessor->setValue('synopsis', $this->crime_record->incident_details);
        $templateProcessor->setValue('investigator', $this->crime_record->investigator);
        $templateProcessor->setValue('felony', $this->crime_record->stage_of_felony);
        $templateProcessor->setValue('category', $this->crime_record->crime_category);
        $templateProcessor->setValue('crime_comm', $this->crime_record->crime_committed);
        //victim
        $templateProcessor->setValue('v_fname', $this->crime_record->victim->firstname);
        $templateProcessor->setValue('v_mname', $this->crime_record->victim->middlename);
        $templateProcessor->setValue('v_lname', $this->crime_record->victim->lastname);
        $templateProcessor->setValue('v_suffix', $this->crime_record->victim->suffix);
        $templateProcessor->setValue('v_bdate', $this->crime_record->victim->birthdate->format('F d, Y'));
        $templateProcessor->setValue('v_bplace', $this->crime_record->victim->birthplace);
        $templateProcessor->setValue('v_gender', $this->crime_record->victim->gender);
        $templateProcessor->setValue('v_marital', $this->crime_record->victim->marital_status);
        $templateProcessor->setValue('v_occupation', $this->crime_record->victim->occupation);
        $templateProcessor->setValue('v_educ', $this->crime_record->victim->education);
        $templateProcessor->setValue('v_nationality', $this->crime_record->victim->citizenship);
        $templateProcessor->setValue('v_address', $this->crime_record->victim->address);
        $templateProcessor->setValue('v_contact', $this->crime_record->victim->contact_number);
        $templateProcessor->setValue('v_ethnic', $this->crime_record->victim->ethnic);
        $templateProcessor->setValue('v_relation', $this->crime_record->victim->relation_to_suspect);
        $templateProcessor->setValue('v_status', $this->crime_record->victim->victim_status);
        $templateProcessor->setValue('v_age', $v_age);
        //suspect
        $templateProcessor->setValue('s_fname', $this->crime_record->suspect->firstname);
        $templateProcessor->setValue('s_mname', $this->crime_record->suspect->middlename);
        $templateProcessor->setValue('s_lname', $this->crime_record->suspect->lastname);
        $templateProcessor->setValue('s_suffix', $this->crime_record->suspect->suffix);
        $templateProcessor->setValue('s_bdate', $this->crime_record->suspect->birthdate->format('F d, Y'));
        $templateProcessor->setValue('s_bplace', $this->crime_record->suspect->birthplace);
        $templateProcessor->setValue('s_gender', $this->crime_record->suspect->gender);
        $templateProcessor->setValue('s_marital', $this->crime_record->suspect->marital_status);
        $templateProcessor->setValue('s_occupation', $this->crime_record->suspect->occupation);
        $templateProcessor->setValue('s_educ', $this->crime_record->suspect->education);
        $templateProcessor->setValue('s_nationality', $this->crime_record->suspect->citizenship);
        $templateProcessor->setValue('s_address', $this->crime_record->suspect->address);
        $templateProcessor->setValue('s_contact', $this->crime_record->suspect->contact_number);
        $templateProcessor->setValue('s_relation', $this->crime_record->suspect->relation_to_victim);
        $templateProcessor->setValue('s_status', $this->crime_record->suspect->suspect_status);
        $templateProcessor->setValue('s_age', $s_age);
        $templateProcessor->setValue('s_weapon', $this->crime_record->suspect->used_weapon);
        $templateProcessor->setValue('s_motive', $this->crime_record->suspect->suspect_motive);

        $filename = 'BMPS-'.$this->crime_record->blotter_entry_no . '_incident-report';
        $tempPath = 'C:\Users\Dayaw\Downloads/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download($tempPath);
    }
    public function render()
    {
        return view('livewire.crime-rec.export');
    }
}
