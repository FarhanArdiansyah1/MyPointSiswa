<?php

namespace App\Http\Livewire;
use App\Models\Contact as Contactos;
use App\Models\Keresmian;
use App\Models\Record;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Contact extends Component
{
    public $data, $datas, $name, $email, $selected_id, $keresmian, $keresmianval, $keresmiannama;
    public $namasiswa,$idsiswa , $prestasi, $poin, $idpelapor;
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
        $this->keresmiann = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
        ]);
        $this->keresmian = Keresmian::where('keresmian', $this->keresmianval)->value('id');
        Contactos::create([
            'name' => $this->name,
            'email' => $this->email,
            'keresmian_id'=> $this->keresmian
        ]);
        $this->resetInput();
    }
    public function stores()
    {
        $this->idsiswa = User::where('name', $this->namasiswa)->value('id');
        $this->validate([
            'prestasi' => 'required',
            'idsiswa' => 'required',
            'poin' => 'required',
        ]);
        $this->idpelapor = Auth::user()->id;
        Record::create([
            'prestasi' => $this->prestasi,
            'poin' => $this->poin,
            'id_pelapor'=> $this->idpelapor,
            'id_siswa' => $this->idsiswa
        ]);
        $this->resetInput();
    }
    public function edit($id)
    {
        $record = Contactos::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->keresmiannama = Keresmian::where('id', $record->keresmian_id)->value('keresmian');
        $this->keresmiann = $record->keresmian_id;
        $this->updateMode = true;
    }

    public function edits($id)
    {
        $record = Contactos::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;
    }

    public function updates()
    {
        $this->validate([
            'prestasi' => 'required',
            'id_siswa' => 'required',
            'poin' => 'poin'
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
                'email' => $this->email,
                'keresmian_id'=> $this->keresmianval
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