<?php

namespace App\Http\Livewire\Import;

use App\Imports\ImportOutlet;
use App\Models\Cluster;
use App\Models\Outlet as OutletModel;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;


class Outlet extends Component
{
    use WithFileUploads;
    const STORE_FOLDER = 'public/importOutlet/';
    const URL_TARGET = 'storage/importOutlet/';



    public $file, $tempName;
    public $data = [];
    public $clusters, $cluster_id, $dealer_id;

    protected $rules = [
        'cluster_id'=>'required',
        'file' => 'file|mimes:xlsx|max:1024', // 1MB Max
    ];
    public function mount()
    {
        $this->clusters = Cluster::all();
    }

    public function updatedFile()
    {
        $this->tempName = $this->file->getClientOriginalName();
        $this->validate();
    }

    public function save()
    {
        $this->validate();
        $name = Carbon::now().$this->file->getClientOriginalName();
        $this->file->storeAs(self::STORE_FOLDER, $name);
        session()->flash('message', 'URL :.'.self::URL_TARGET.$name);

        $rows = \Maatwebsite\Excel\Facades\Excel::toArray(new ImportOutlet(),self::URL_TARGET.$name);
        $newOutlets = [];
        foreach ($rows[0] as $row) {
            $row['dealer_id'] =$this->dealer_id;
            $row['cluster_id'] = $this->cluster_id;
            $row['msisdn'] = $row['dompul_msisdn'];
            $row['name'] = $row['outlet_name'];
            $row['xl_outlet_id'] = $row['outlet_id'];
            $row['type'] = $row['outlet_type'];
            unset($row['outlet_id'], $row['outlet_name'], $row['dompul_msisdn'], $row['outlet_type'], $row['sales_cluster']);
            array_push($newOutlets, $row);
        }

        $chunks = array_chunk($newOutlets,1000);
        OutletModel::insertOrIgnore($chunks[0]);

        return redirect()->to(route('dealer.outlet',['dealer'=>$this->dealer_id]));
    }
    public function render()
    {
        return view('livewire.import.outlet');
    }
}
