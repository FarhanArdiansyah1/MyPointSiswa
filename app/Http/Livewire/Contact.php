<?php

namespace App\Http\Livewire;
use App\Contact as Contactos;
use App\Keresmian;
use App\Models\Record;
use Livewire\Component;
class Contact extends Component
{
    public $data, $datas, $name, $email, $selected_id, $keresmian, $keresmianval;
    public $updateMode = false;
    public function render()
    {
        $this->data = Contactos::with('keresmian')->get();
        $this->datas = Record::with('getsiswa')->with('getpelapor')->where('id_pelanggaran', null)->get();
        $this->keresmian = Keresmian::all();
        return view('livewire.contact');
    }
    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->keresmianval = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
        ]);
        Contactos::create([
            'name' => $this->name,
            'email' => $this->email,
            'keresmian_id'=> $this->keresmianval
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Contactos::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns'
        ]);
        if ($this->selected_id) {
            $record = Contactos::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->resetInput();
            $this->updateMode = false;
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = Contactos::where('id', $id);
            $record->delete();
        }
    }
}