<?php

namespace App\Http\Livewire\Chart;

use App\Helpers\QueryReport;
use App\Models\Question;
use Livewire\Component;

class TableFromQuestion extends Component
{
    public $question_id;
    public $data;

    public function mount($question_id)
    {
        $this->data = QueryReport::getResponseTextFromQuestion($question_id);
    }
    public function render()
    {
        return view('livewire.chart.table-from-question');
    }
}
