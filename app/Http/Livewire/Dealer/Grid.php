<?php

namespace App\Http\Livewire\Dealer;

use App\Models\Dealer;
use Livewire\Component;

class Grid extends Component
{
    public $dealers;

    protected $listeners = ['saved'=>'$refresh'];

    public function render()
    {
        $this->dealers = Dealer::orderBy('id','desc')->get();
        return view('livewire.dealer.grid');
    }
}
