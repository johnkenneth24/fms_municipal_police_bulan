<?php

namespace App\Http\Livewire\CrimeRec;

use App\Models\Victim;
use App\Models\Suspect;
use Livewire\Component;
use App\Models\CrimeRecord;

class Restore extends Component
{

    public $crime_record;
    protected $listeners = ['restore'];

    public function restoreConfirm()
    {
        $this->dispatchBrowserEvent('swal:restore', [
            'id' => $this->crime_record->id,
            'message' => 'Are you sure to restore?'
        ]);
    }


    public function restore($id)
    {
        $crimeRec = CrimeRecord::onlyTrashed()->find($id);

        if ($crimeRec != null) {
            $victim = Victim::onlyTrashed()->where('crime_record_id', $crimeRec->id)->first();
            $suspect = Suspect::onlyTrashed()->where('crime_record_id', $crimeRec->id)->first();

            // restore the crimeRec then the victim and suspect next
            $crimeRec->restore();
            $victim->restore();
            $suspect->restore();

            return redirect()->to('/archive')->with('success', 'Crime Record restored successfully!');
        } else {
            return redirect()->to('/archive')->with('error', 'Crime Record not found!');
        }
    }

    public function render()
    {
        return view('livewire.crime-rec.restore');
    }
}
