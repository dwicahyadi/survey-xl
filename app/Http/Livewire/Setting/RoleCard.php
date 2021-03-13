<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;

class RoleCard extends Component
{
    public $role, $permissions, $rolePermissions;
    public $editing = 0;

    protected $listeners = ['saved'=>'$refresh', 'closeEdit'];

    public function render()
    {
        $this->rolePermissions = $this->role->permissions->pluck('name')->toArray();
        return view('livewire.setting.role-card');
    }

    public function updatedRolePermissions($value)
    {
        $this->role->syncPermissions($value);
    }


    public function closeEdit()
    {
        $this->editing = 0;
    }
}
