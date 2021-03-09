<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;

class UserCard extends Component
{
    public $user, $permissions;
    public $editing = 0;

    protected $listeners = ['saved'=>'$refresh', 'closeEdit'];

    public function render()
    {
        return view('livewire.setting.user-card');
    }

    public function resetPassword()
    {
        $this->user->password = bcrypt('passwprd');
        $this->user->update();

        $this->emit('saved');
    }

    public function closeEdit()
    {
        $this->editing = 0;
    }
}
