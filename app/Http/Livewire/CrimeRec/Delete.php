<?php

namespace App\Http\Livewire\CrimeRec;

use Livewire\Component;
use App\Models\CrimeRecord;

class Delete extends Component
{
    protected $listeners = ['delete'];
    public $crime_record;

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $this->crime_record->id,
            'message' => 'Are you sure?',
        ]);
    }

    public function delete($id)
    {
        $crime_record = CrimeRecord::where('id', $id)->first();
        if ($crime_record != null) {
            $crime_record->delete();
            return redirect()->route('crime-record.index');
        }
        return redirect()->route('crime-record.index')->with('error', 'Something went wrong');
    }

    public function render()
    {
        return view('livewire.crime-rec.delete');
    }
}
