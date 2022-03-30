<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\StudentsExport;
use App\Models\Pelanggaran;

class Datapelanggaran extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = "";
    public $checked = [];
    public $selectPage = false;
    public $selectAll = false;
    public $poin, $namapel;
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

    private function resetInput()
    {
        $this->namapel = null;
        $this->poin = null;
    }

    public function render()
    {
        return view('livewire.datapelanggaran', [
            'students' => $this->students,
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
        return Pelanggaran::search(trim($this->search));
    }

    public function deleteRecords()
    {
        User::whereKey($this->checked)->delete();
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
        $student = User::findOrFail($student_id);
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
        $this->validate([
            'namapel' => 'required',
            'poin' => 'required',
        ]);
        Pelanggaran::create([
            'nama_pelanggaran' => $this->namapel,
            'poin' => $this->poin,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-create');
    }

    public function edit($id)
    {
        $record = Pelanggaran::findOrFail($id);
        //data yang masuk input hide untuk dibawa ke fungsi berikutnya (update)
        $this->selected_id = $id;
        $this->poin = $record->poin;
        $this->namapel = $record->nama_pelanggaran;
        // event showmodal ke jquery
        $this->dispatchBrowserEvent('show-update');
    }

    public function update()
    {
        $record = Pelanggaran::find($this->selected_id);
        $this->validate([
            'namapel' => 'required',
            'poin' => 'required',
        ]);
        $record->update([
            'nama_pelanggaran' => $this->namapel,
            'poin' => $this->poin,
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-update');
    }
}
