<?php

namespace App\Http\Livewire\Setting;

use App\Models\Dealer;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserForm extends Component
{
    public $dealers, $roles;
    public $name, $email, $password = 'password', $role, $dealerId;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|min:6|email|unique:users',
    ];

    public function mount()
    {
        $this->roles = Role::all();
        $this->dealers = Dealer::all();
    }

    public function render()
    {
        return view('livewire.setting.user-form');
    }
    public function save()
    {
        $this->validate();
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
            'dealer_id'=>$this->dealerId
        ])
            ->assignRole($this->role);

        $this->clear();
        $this->emit('saved');
        session()->flash('message', 'Added new '.$this->role.' for dealer.');

    }

    private function clear()
    {
        $this->name = '';
        $this->email = '';
        $this->role = 'surveyor';
    }

}
