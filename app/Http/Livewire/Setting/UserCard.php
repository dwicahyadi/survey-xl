<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;

class UserCard extends Component
{
    public $user, $permissions;
    public $editing = 0;
    public $isReset = false;

    protected $listeners = ['saved'=>'$refresh', 'closeEdit'];

    public function render()
    {
        return view('livewire.setting.user-card');
    }

    public function resetPassword()
    {
        $this->user->password = bcrypt('password');
        $this->user->save();
        $this->isReset = true;

        $this->emit('saved');
    }

    public function closeEdit()
    {
        $this->editing = 0;
    }
}
