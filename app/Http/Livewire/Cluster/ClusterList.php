<?php

namespace App\Http\Livewire\Cluster;

use App\Models\Cluster;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ClusterList extends Component
{

    protected $paginationTheme = 'bootstrap';

    public $search, $permissions;

    protected $listeners = ['saved'=>'$refresh'];



    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function render()
    {

        return view('livewire.cluster.cluster-list',[
        'clusters' => Cluster::with('micro_clusters')->withCount('outlets')->get(),
        ]);
    }
}
