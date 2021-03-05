<?php

namespace App\Http\Livewire\Dealer;

use Livewire\Component;

class UserCard extends Component
{
    public $user;
    public $editing = 0;

    protected $listeners = ['saved'=>'$refresh', 'closeEdit'];

    public function render()
    {
        return view('livewire.dealer.user-card');
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
