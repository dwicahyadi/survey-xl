<?php

namespace App\Http\Livewire\SurveyQuestion;

use App\Models\Question;
use App\Models\Section;
use Livewire\Component;

class QuestionList extends Component
{
    public $sections;
    public $selectedSectionId;
    public $selectedSection;

    protected $listeners = [
        'selectSectionId'
    ];


    public function render()
    {
        return view('livewire.survey-question.question-list');
    }

    public function selectSectionId(Section $section)
    {
//        $this->selectedSectionId = $id;

//        $this->selectedSection = $this->sections->where('id',$id)->first();
        $this->selectedSection = $section;
    }

}
