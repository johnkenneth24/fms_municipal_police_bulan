<?php

namespace App\Http\Livewire\CrimeRec;

use Livewire\Component;
use App\Models\CrimeRecord;

class Restore extends Component
{

    public $crime_record;

    public function restoreConfirm()
    {
        $this->dispatchBrowserEvent('swal:restore', [
            'id' => $this->crime_record->id,
            'message' => 'Are you sure?',
        ]);
    }

    public function restore($id)
    {
        CrimeRecord::withTrashed()->where('id' , $id)->restore();

        // if ($crime_record != null) {



            return redirect()->route('crime-record.index');
        // }
        // return redirect()->route('crime-record.index')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.crime-rec.restore');
    }
}
