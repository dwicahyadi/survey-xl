<?php

namespace App\Http\Livewire\Dealer;

use App\Models\City;
use App\Models\Cluster;
use App\Models\Dealer;
use App\Models\MicroCluster;
use App\Models\Outlet;
use App\Models\OutletType;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\User;
use Auth;
use Livewire\Component;

class OutletForm extends Component
{
    public  $types, $clusters, $dealers, $provinces, $cities = [], $subdistricts = [], $micro_clusters = [];
    public $cluster_id, $xl_outlet_id, $msisdn, $type, $name, $address, $province, $city, $subdistrict, $micro_cluster, $dealerId;

    protected $rules = [
        'name' => 'required|min:6',
        'msisdn'=> 'required|min:10|max:15|unique:outlets',
        'type'=>'required',
        'address'=>'required',
        'province'=>'required',
        'city'=>'required',
        'subdistrict'=>'required',
        'micro_cluster'=>'required',
        'dealerId'=>'required',
        'cluster_id'=>'required',
    ];

    public function mount()
    {
        $this->types = OutletType::all();
        $this->clusters = Cluster::all();
        if (!$this->dealerId)
            $this->dealers = Dealer::all();
        $this->provinces = Province::orderBy('name')->get();

        if (Auth::user()->province)
        {
            $this->province = Auth::user()->province;
            $this->updatedProvince(Auth::user()->province);
            $this->city = Auth::user()->city;
            $this->updatedCity(Auth::user()->city);
        }



    }
    public function render()
    {
        return view('livewire.dealer.outlet-form');
    }

    public function updatedProvince($value)
    {
        $selected = (object) json_decode($value);
        $this->cities = City::where('province_id', $selected->id)->orderBy('name')->get();
    }

    public function updatedCity($value)
    {
        $selected = (object) json_decode($value);
        $this->subdistricts = Subdistrict::where('regency_id', $selected->id)->orderBy('name')->get();
    }

    public function updatedClusterId($value)
    {
        $this->micro_clusters = MicroCluster::where('cluster_id', $value)->orderBy('name')->get();
    }


    public function save()
    {
        $this->validate();

        Outlet::create([
            'name'=>$this->name,
            'msisdn'=>$this->msisdn,
            'dealer_id'=>$this->dealerId,
            'cluster_id'=>$this->cluster_id,
            'xl_outlet_id'=>$this->xl_outlet_id,
            'type'=>$this->type,
            'address'=>$this->address,
            'province'=>json_decode($this->province)->name,
            'city'=>json_decode($this->city)->name,
            'subdistrict'=>json_decode($this->subdistrict)->name,
            'micro_cluster'=>$this->micro_cluster,
        ]);

        $this->clear();
        $this->emit('saved');
        session()->flash('message', 'Added new Outlet for dealer.');

    }

    private function clear()
    {
        $this->name = '';
        $this->msisdn = '';
        $this->xl_outlet_id = '';
        $this->type = '';
        $this->address = '';
        $this->province = '';
        $this->city = '';
        $this->micro_cluster = '';
        $this->cluster_id = 0;
    }

}
