<?php

namespace App\Http\Livewire\Chart;

use App\Helpers\QueryReport;
use App\Models\Question;
use Livewire\Component;

class StatFormQuestion extends Component
{
    public $question_id;
    public $question;
    public $elementId, $title, $data;

    public $dealers, $clusters, $startDate, $endDate, $dealer_id, $cluster_id;

    protected $queryString = ['startDate','endDate', 'dealer_id', 'cluster_id'];


    public function render()
    {
        $this->data = QueryReport::getResponseNumberFromQuestion(
            $this->question_id,
            $this->startDate ?? '',
            $this->endDate ?? '',
            $this->dealer_id ?? 0,
            $this->cluster_id ?? 0,
        );
        return view('livewire.chart.stat-form-question');
    }
}
