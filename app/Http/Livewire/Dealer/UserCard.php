<?php

namespace App\Http\Livewire\Dealer;

use Livewire\Component;

class UserCard extends Component
{
    public $user;
    public $editing = 0;
    public $isReset = false;

    protected $listeners = ['saved'=>'$refresh', 'closeEdit'];

    public function render()
    {
        return view('livewire.dealer.user-card');
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
