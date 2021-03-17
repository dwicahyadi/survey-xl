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
        $this->clusters = Cluster::with('micro_clusters')->withCount('outlets')->orderBy('id','desc')->get();
        return view('livewire.cluster.cluster-grid');
    }


}
