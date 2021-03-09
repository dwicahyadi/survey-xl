<?php

namespace App\Http\Livewire\SurveyQuestion;

use App\Models\Section;
use Livewire\Component;

class SectionList extends Component
{
    public $sections;
    public $selectedSectionId = 0;

    protected $listeners = [
        'saved'=>'$refresh',
        'selectSectionId'
        ];

    public function render()
    {
        $this->sections = Section::all();
        return view('livewire.survey-question.section-list');
    }

    public function selectSectionId(Section $section)
    {
        $this->selectedSectionId = $section->id;
    }
}
