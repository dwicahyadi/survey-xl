<?php

namespace App\Http\Livewire\Cluster;

use App\Models\Cluster;
use App\Models\Dealer;
use Livewire\Component;

class ClusterForm extends Component
{
    public $name, $address;

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.cluster.cluster-form');
    }

    public function save()
    {
        $this->validate();
        Cluster::create(['name'=>$this->name, 'address'=>$this->address]);
        $this->clear();
        $this->emit('saved');
        session()->flash('message', 'Added new cluster.');

    }

    private function clear()
    {
        $this->name = '';
        $this->address = '';
    }
}
