<?php

namespace App\Http\Livewire\Dealer;

use App\Models\Dealer;
use Livewire\Component;

class Form extends Component
{
    public $name, $address;

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.dealer.form');
    }

    public function save()
    {
        $this->validate();
        Dealer::create(['name'=>$this->name, 'address'=>$this->address]);
        $this->clear();
        $this->emit('saved');
        session()->flash('message', 'Added new dealer.');

    }

    private function clear()
    {
        $this->name = '';
        $this->address = '';
    }
}
