<?php

namespace App\Http\Livewire\Dealer;

use App\Models\Cluster;
use App\Models\Dealer;
use App\Models\Outlet;
use App\Models\User;
use Livewire\Component;

class OutletForm extends Component
{
    public  $clusters, $dealers;
    public $cluster_id, $xl_outlet_id, $msisdn, $type, $name, $address, $province, $city, $micro_cluster, $dealerId;

    protected $rules = [
        'name' => 'required|min:6',
        'msisdn'=> 'required|min:10|max:13|unique:outlets',
//        'xl_outlet_id'=>'required|unique:outlets',
        'type'=>'required',
        'address'=>'required',
        'city'=>'required',
        'micro_cluster'=>'required',
        'dealerId'=>'required',
        'cluster_id'=>'required',
    ];

    public function mount()
    {
        $this->clusters = Cluster::all();
        if (!$this->dealerId)
            $this->dealers = Dealer::all();

    }
    public function render()
    {
        return view('livewire.dealer.outlet-form');
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
            'province'=>$this->province,
            'city'=>$this->city,
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
