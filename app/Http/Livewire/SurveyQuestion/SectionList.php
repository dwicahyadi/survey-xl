<?php

namespace App\Http\Livewire\SurveyQuestion;

use App\Models\Section;
use Livewire\Component;

class SectionList extends Component
{
    public $sections;
    public $selectedSection = 0;

    protected $listeners = [
        'saved'=>'$refresh',
        'selectSection'
        ];

    public function render()
    {
        $this->sections = Section::withCount(['questions'])->get();
        return view('livewire.survey-question.section-list');
    }

    public function selectSection($id)
    {
        $this->selectedSection = $id;
    }
}
