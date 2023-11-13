<?php

namespace App\Http\Livewire\Suspect;

use Livewire\Component;
use App\Models\Suspect;
use App\Models\CrimeRecord;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{
    public $from;
    public $to;

    public $path_export = 'docx/suspect_compilation.docx';

    public function export()
    {
        $crimeRecords = CrimeRecord::whereBetween('date_committed', [$this->from, $this->to])
        ->orderBy('date_committed', 'asc')
        ->get();

        $path = storage_path($this->path_export);
        $templateProcessor = new TemplateProcessor($path);

        $fromDate = new \DateTime($this->from);
        $toDate = new \DateTime($this->to);

        $templateProcessor->setValue('from', $fromDate->format('F d, Y'));
        $templateProcessor->setValue('to', $toDate->format('F d, Y'));
        $templateProcessor->setValue('dateNow', now()->format('F d, Y'));

        // Cloning rows for each record
        $templateProcessor->cloneRow('bn', count($crimeRecords));

        foreach ($crimeRecords as $index => $record) {
            $middleNameInitial = !empty($record->suspect->middlename) ? strtoupper(substr($record->suspect->middlename, 0, 1)) . '.' : '';
            $fullName = implode(' ', array_filter([$record->suspect->firstname, $middleNameInitial, $record->suspect->lastname, $record->suspect->suffix]));

            $templateProcessor->setValue('bn#' . ($index + 1), $record->blotter_entry_no); // Populate row number
            $templateProcessor->setValue('suspect#' . ($index + 1), $fullName);
            $templateProcessor->setValue('date#' . ($index + 1), $record->date_committed->format('F d, Y'));
        }



        $filename = 'Suspect Compilation-' . now()->format('Y-m-d');
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));

    }

    public function render()
    {
        return view('livewire.suspect.export');
    }
}
