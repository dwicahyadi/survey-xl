<?php

namespace App\Http\Livewire\Chart;

use App\Helpers\QueryReport;
use App\Models\Question;
use Livewire\Component;

class PieChartFormQuestion extends Component
{
    public $question_id;
    public $question;
    public $elementId, $title, $data;

    public function mount($question_id)
    {
        $this->elementId = 'pieChart_'.$question_id;
        $this->question = Question::find($question_id);
        $this->title = $this->question->text;
        $this->data = json_encode(QueryReport::summaryResponseFromQuestion($question_id));
    }
    public function render()
    {
        return view('livewire.chart.pie-chart-form-question');
    }
}
