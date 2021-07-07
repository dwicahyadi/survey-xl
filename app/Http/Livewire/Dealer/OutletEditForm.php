<?php

namespace App\Http\Livewire\Dealer;

use App\Models\Cluster;
use App\Models\Outlet;
use App\Models\User;
use Livewire\Component;

class OutletEditForm extends Component
{
    public $outlet;
    public  $clusters;
    public $cluster_id, $xl_outlet_id, $msisdn, $type, $name, $address, $province, $city, $micro_cluster;

    protected $rules = [
        'name' => 'required|min:6',
        'msisdn'=> 'required|digits_between:10,15|numeric',
//        'xl_outlet_id'=>'required',
        'type'=>'required',
        'address'=>'required',
        'city'=>'required',
        'micro_cluster'=>'required',
    ];

    public function mount()
    {
        $this->clusters = Cluster::all();
        $this->cluster_id = $this->outlet->cluster_id;
//        $this->xl_outlet_id = $this->outlet->xl_outlet_id;
        $this->msisdn = $this->outlet->msisdn;
        $this->type = $this->outlet->type;
        $this->name = $this->outlet->name;
        $this->address = $this->outlet->address;
        $this->province = $this->outlet->province;
        $this->city = $this->outlet->city;
        $this->micro_cluster = $this->outlet->micro_cluster;
    }
    public function render()
    {
        return view('livewire.dealer.outlet-edit-form');
    }
    public function save()
    {
        $this->validate();
        $this->outlet->cluster_id = $this->cluster_id;
//        $this->outlet->xl_outlet_id = $this->xl_outlet_id;
        $this->outlet->msisdn = $this->msisdn;
        $this->outlet->type = $this->type;
        $this->outlet->name = $this->name;
        $this->outlet->address = $this->address;
        $this->outlet->province = $this->province;
        $this->outlet->city = $this->city;
        $this->outlet->micro_cluster = $this->micro_cluster;
        $this->outlet->update();

        $this->emitUp('saved');
        $this->emitUp('closeEdit');
        session()->flash('message', 'Added new Outlet for dealer.');

    }


}
