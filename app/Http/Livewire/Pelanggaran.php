<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StudentsExport;
use App\Models\Record;
use App\Models\Pelanggaran as Pelanggarans;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Pelanggaran extends Component
{
    public $namasiswa, $idsiswa, $prestasi, $poin, $idpelapor;
    use WithPagination;
    public $paginate = 10;
    public $search = "";
    public $checked = [];
    public $selectPage = false;
    public $selectedSiswa = null;
    public $idpelanggaran = null;
    public $selectedPelapor = null;
    public $selectedPelanggaran = null;
    public $selectAll = false;
    protected $paginationTheme = 'bootstrap';

    public function showCreate()
    {
        $this->dispatchBrowserEvent('show-create');
    }

    public function closeCreate()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('close-create');
    }

    public function showUpdate()
    {
        $this->dispatchBrowserEvent('show-update');
    }

    public function closeUpdate()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('close-update');
    }

    public function render()
    {
        return view('livewire.pelanggaran', [
            'students' => $this->students,
            'pelanggaran' => Pelanggarans::all(),
        ]);
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->checked = $this->students->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        $this->selectPage = false;
    }

    public function selectAll()
    {
        $this->selectAll = true;
        $this->checked = $this->studentsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function getStudentsProperty()
    {
        return $this->studentsQuery->paginate($this->paginate);
    }

    public function getStudentsQueryProperty()
    {
        return Record::with(['getsiswa', 'getpelapor', 'getpelanggaran'])
            ->when($this->selectedSiswa, function ($query) {
                $query->where('id_siswa', $this->selectedClass);
            })
            ->when($this->selectedPelapor, function ($query) {
                $query->where('id_pelapor', $this->selectedClass);
            })
            ->when($this->selectedPelanggaran, function ($query) {
                $query->where('id_pelaggaran', $this->selectedClass);
            })->where('prestasi', null)
            ->search(trim($this->search));
    }

    public function deleteRecords()
    {
        Record::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll = false;
        $this->selectPage = false;
        session()->flash('info', 'Selected Records were deleted Successfully');
    }

    public function exportSelected()
    {
        return (new StudentsExport($this->checked))->download('students.xlsx');
    }


    public function deleteSingleRecord($student_id)
    {
        $student = Record::findOrFail($student_id);
        $student->delete();
        $this->checked = array_diff($this->checked, [$student_id]);
        session()->flash('info', 'Record deleted Successfully');
    }

    public function isChecked($student_id)
    {
        return in_array($student_id, $this->checked);
    }

    public function stores()
    {
        $this->idsiswa = User::where('name', $this->namasiswa)->where('jabatan', 'siswa')->value('id');
        $this->validate([
            'idsiswa' => 'required',
            'idpelanggaran' => 'required'
        ]);
        $this->idpelapor = Auth::user()->id;
        Record::create([
            'id_pelanggaran' => $this->idpelanggaran,
            'id_pelapor' => $this->idpelapor,
            'id_siswa' => $this->idsiswa
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-create');
    }

    public function edit($id)
    {
        $record = Record::findOrFail($id);
        $this->selected_id = $id;
        $this->namasiswa = User::where('id', $record->id_siswa)->value('name');
        $this->idpelanggaran = $record->id_pelanggaran;
        $this->dispatchBrowserEvent('show-update');
    }

    public function update()
    {
        $record = Record::find($this->selected_id);
        $this->idsiswa = User::where('name', $this->namasiswa)->where('jabatan', 'siswa')->value('id');
        $this->idpelapor = Auth::user()->id;
        $record->update([
            'id_pelanggaran' => $this->idpelanggaran,
            'id_pelapor' => $this->idpelapor,
            'id_siswa' => $this->idsiswa
        ]);
        $this->resetInput();
        $this->updateMode = false;
        $this->dispatchBrowserEvent('close-update');
    }

    private function resetInput()
    {
        $this->selected_id = null;
        $this->namasiswa = null;
        $this->prestasi = null;
        $this->id_pelanggaran = null;
        $this->poin = null;
    }
}