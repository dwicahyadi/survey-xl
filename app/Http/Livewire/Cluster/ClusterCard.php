<?php

namespace App\Http\Livewire\Cluster;

use App\Models\Cluster;
use Livewire\Component;

class ClusterCard extends Component
{
    public $cluster;
    public $mc_name;

    protected $listeners = ['saved'=>'$refresh'];

    public function render()
    {
        return view('livewire.cluster.cluster-card');
    }

    public function saveMicroCluster()
    {
        $this->cluster->micro_clusters()->create(['name'=>$this->mc_name]);
        $this->mc_name = '';
        $this->emit('saved');
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


        $this->emitUp('saved');

    }
}
