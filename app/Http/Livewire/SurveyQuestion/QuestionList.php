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

    public function selectSectionId(int $id)
    {
//        $this->selectedSectionId = $id;

        $this->selectedSection = $this->sections->where('id',$id)->first();
    }

    public function toggleActive(Question $question)
    {
        $question->is_active = !$question->is_active ;
        $question->save();
    }
}
