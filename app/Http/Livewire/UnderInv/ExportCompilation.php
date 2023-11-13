<?php

namespace App\Http\Livewire\UnderInv;

use Livewire\Component;
use App\Models\CrimeRecord;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportCompilation extends Component
{

    public $from;
    public $to;

    public $path_export = 'docx/under_inv_compilation.docx';

    public function export()
    {
        $crimeRecords = CrimeRecord::where('case_status', 'Under Investigation')
        ->whereBetween('date_committed', [$this->from, $this->to])
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

            $templateProcessor->setValue('bn#' . ($index + 1), $record->blotter_entry_no); // Populate row number
            $templateProcessor->setValue('date_committed#' . ($index + 1), $record->date_committed->format('F d, Y'));
            $templateProcessor->setValue('date#' . ($index + 1), $record->case_progress);
        }



        $filename = 'Under Investigation  Compilation-' . now()->format('Y-m-d');
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));

    }
    public function render()
    {
        return view('livewire.under-inv.export-compilation');
    }
}
