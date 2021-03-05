<?php

namespace App\Http\Livewire\Import;

use App\Imports\ImportOutlet;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Excel;
use phpDocumentor\Reflection\Types\Self_;

class Outlet extends Component
{
    use WithFileUploads;
    const STORE_FOLDER = 'public/importOutlet/';
    const URL_TARGET = 'storage/importOutlet/';

    public $file, $tempName;
    public $data = [];

    public function updatedFile()
    {
        $this->tempName = $this->file->getClientOriginalName();
        $this->validate([
            'file' => 'file|mimes:xlsx|max:1024', // 1MB Max
        ]);
    }

    public function save()
    {
        $name = Carbon::now().$this->file->getClientOriginalName();
        $this->file->storeAs(self::STORE_FOLDER, $name);
        session()->flash('message', 'URL :.'.self::URL_TARGET.$name);

        $this->data = \Maatwebsite\Excel\Facades\Excel::toArray(new ImportOutlet(),self::URL_TARGET.$name);
//        dd($this->data);
    }
    public function render()
    {
        return view('livewire.import.outlet');
    }
}
