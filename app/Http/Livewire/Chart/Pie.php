<?php

namespace App\Http\Livewire\Chart;

use Livewire\Component;

class Pie extends Component
{
    public $elementId, $title, $itemName, $data = [];

    public function render()
    {
        $this->data = json_encode($this->data);
        return view('livewire.chart.pie');
    }
}
