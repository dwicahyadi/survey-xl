<?php

namespace App\Http\Livewire\Dealer;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserForm extends Component
{
    public $name, $email, $password = 'password', $role, $dealerId;

    public $roles;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|min:6|email|unique:users',
    ];

    public function mount()
    {
        $this->roles = Role::where('id','>',2)->get();
    }
    public function render()
    {
        return view('livewire.dealer.user-form');
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
