<?php

namespace App\Http\Livewire\Dealer;

use Livewire\Component;

class OutletCard extends Component
{
    public $outlet;
    public $editing = 0;

    protected $listeners = ['saved'=>'$refresh', 'closeEdit'];

    public function render()
    {
        return view('livewire.dealer.outlet-card');
    }

    public function closeEdit()
    {
        $this->editing = 0;
    }
}
