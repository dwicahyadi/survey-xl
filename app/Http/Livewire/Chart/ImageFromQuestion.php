<?php

namespace App\Http\Livewire\Chart;

use App\Helpers\QueryReport;
use App\Models\Question;
use Livewire\Component;

class ImageFromQuestion extends Component
{
    public $question_id;
    public $data, $random;

    public function mount($question_id)
    {
        $this->data = QueryReport::getResponseTextFromQuestion($question_id);

    }
    public function render()
    {
//        $this->random = '';
//        $this->random = (array) $this->data[rand(0, count($this->data)-1)];
        return view('livewire.chart.image-from-question');
    }

}
