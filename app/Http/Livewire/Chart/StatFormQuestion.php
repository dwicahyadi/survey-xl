<?php

namespace App\Http\Livewire\Chart;

use App\Helpers\QueryReport;
use App\Models\Question;
use Livewire\Component;

class StatFormQuestion extends Component
{
    public $question_id;
    public $data;

    public function mount($question_id)
    {
        $this->data = QueryReport::getResponseNumberFromQuestion($question_id);
    }
    public function render()
    {
        return view('livewire.chart.stat-form-question');
    }
}
