<?php

namespace App\Http\Livewire\Setting;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $permissions;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    protected $listeners = ['saved'=>'$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function render()
    {

        return view('livewire.setting.role-list',[
        'roles' => Role::with('permissions')
            ->where('name','like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
}
