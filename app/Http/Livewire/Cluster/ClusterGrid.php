<?php

namespace App\Http\Livewire\Cluster;

use App\Models\Cluster;
use App\Models\Dealer;
use Livewire\Component;

class ClusterGrid extends Component
{
    public $clusters;

    protected $listeners = ['saved'=>'$refresh'];

    public function render()
    {
        $this->clusters = Cluster::withCount('outlets')->orderBy('id','desc')->get();
        return view('livewire.cluster.cluster-grid');
    }

    public function delete($id)
    {
        $cluster = Cluster::withCount('outlets')->find($id);
        if ($cluster->outlets_count > 1)
        {
            session()->flash('message', 'That cluster have Outlets.');
        }
        else
        {
            $cluster->delete();
            session()->flash('message', 'Cluster deleted');

        }


        $this->emit('saved');

    }
}
