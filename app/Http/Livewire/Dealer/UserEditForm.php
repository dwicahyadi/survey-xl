<?php

namespace App\Http\Livewire\Dealer;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEditForm extends Component
{
    public $user;
    public $name, $email, $password = 'password', $role, $dealerId;
    public $roles;

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function  mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->roles[0]->name ?? 'surveyor';
        $this->roles = Role::where('id','>',2)->get();
    }
    public function render()
    {
        return view('livewire.dealer.user-edit-form');
    }
    public function save()
    {
        $this->validate();
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->update();
        $this->user->syncRoles($this->role);

        $this->emitUp('saved');
        $this->emitUp('closeEdit');
        session()->flash('message', 'Update '.$this->role.' for dealer.');

    }


}
