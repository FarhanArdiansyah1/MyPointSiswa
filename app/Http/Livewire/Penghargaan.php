<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StudentsExport;
use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Penghargaan extends Component
{
    public $namasiswa, $idsiswa, $prestasi, $poin, $idpelapor;
    use WithPagination;
    public $paginate = 10;
    public $search = "";
    public $checked = [];
    public $selectPage = false;
    public $selectedSiswa = null;
    public $selectedPelapor = null;
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
        return view('livewire.penghargaan', [
            'students' => $this->students,
            'classes' => User::all(),
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
        return Record::with(['getsiswa', 'getpelapor'])
            ->when($this->selectedSiswa, function ($query) {
                $query->where('id_siswa', $this->selectedClass);
            })
            ->when($this->selectedPelapor, function ($query) {
                $query->where('id_pelapor', $this->selectedClass);
            })->where('id_pelanggaran', null)
            ->search(trim($this->search));
    }

    public function deleteRecords()
    {
        foreach ($this->checked as $check) {
            $record = Record::findOrFail($check);
            $poinsiswa = User::where('id', $record->id_siswa)->where('jabatan', 'siswa')->value('poin');
            $poinupdate = $poinsiswa - $record->poin;
            $user = User::find($record->id_siswa);
            $user->update([
                'poin' => $poinupdate,
            ]);
            Record::whereKey($check)->delete();
        }
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
        $record = Record::findOrFail($student_id);
        $poinsiswa = User::where('id', $record->id_siswa)->where('jabatan', 'siswa')->value('poin');
        $poinupdate = $poinsiswa - $record->poin;
        $user = User::find($record->id_siswa);
        $user->update([
            'poin' => $poinupdate,
        ]);
        $record->delete();
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
            'prestasi' => 'required',
            'poin' => 'required'
        ]);
        $this->idpelapor = Auth::user()->id;
        Record::create([
            'prestasi' => $this->prestasi,
            'poin' => $this->poin,
            'id_pelapor' => $this->idpelapor,
            'id_siswa' => $this->idsiswa
        ]);
        $poinsiswa = User::where('name', $this->namasiswa)->where('jabatan', 'siswa')->value('poin');
        $poinupdate = $poinsiswa + $this->poin;
        $record = User::find($this->idsiswa);
        $record->update([
            'poin' => $poinupdate,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-create');
    }

    public function edit($id)
    {
        $record = Record::findOrFail($id);
        $this->selected_id = $id;
        $this->poinpeng = $record->poin;
        $this->namesiswa = User::where('id', $record->id_siswa)->value('name');
        $this->idasalsiswa = $record->id_siswa;

        $this->poin = $record->poin;
        $this->prestasi = $record->prestasi;
        $this->namasiswa = User::where('id', $record->id_siswa)->value('name');
        $this->dispatchBrowserEvent('show-update');
    }

    public function update()
    {
        if ($this->namesiswa === $this->namasiswa) {
            $record = Record::find($this->selected_id);
            $this->idsiswa = User::where('name', $this->namasiswa)->where('jabatan', 'siswa')->value('id');
            $this->idpelapor = Auth::user()->id;
            $record = Record::find($this->selected_id);
            $record->update([
                'poin' => $this->poin,
                'prestasi' => $this->prestasi,
                'id_siswa' => $this->idsiswa,
                'id_pelapor' => $this->idpelapor,
            ]);
            $this->poinsiswa = User::where('name', $this->namasiswa)->where('jabatan', 'siswa')->value('poin');
            $this->updatepoinsiswa = $this->poinsiswa - $this->poinpeng + $this->poin;
            $user = User::find($this->idsiswa);
            $user->update([
                'poin' => $this->updatepoinsiswa,
            ]);
        } else {
            $record = Record::find($this->selected_id);
            $this->idsiswa = User::where('name', $this->namasiswa)->where('jabatan', 'siswa')->value('id');
            $this->idpelapor = Auth::user()->id;
            $record = Record::find($this->selected_id);
            $record->update([
                'poin' => $this->poin,
                'prestasi' => $this->prestasi,
                'id_siswa' => $this->idsiswa,
                'id_pelapor' => $this->idpelapor,
            ]);
            $this->poinsiswa = User::where('name', $this->namesiswa)->where('jabatan', 'siswa')->value('poin');
            $this->updatepoinsiswa = $this->poinsiswa - $this->poinpeng;
            $user = User::find($this->idasalsiswa);
            $user->update([
                'poin' => $this->updatepoinsiswa,
            ]);
            $this->poinsiswa1 = User::where('name', $this->namasiswa)->where('jabatan', 'siswa')->value('poin');
            $this->updatepoinsiswa1 = $this->poinsiswa1 + $this->poin;
            $user1 = User::find($this->idsiswa);
            $user1->update([
                'poin' => $this->updatepoinsiswa1,
            ]);
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('close-update');
    }

    private function resetInput()
    {
        $this->selected_id = null;
        $this->namasiswa = null;
        $this->prestasi = null;
        $this->poin = null;
    }
}
