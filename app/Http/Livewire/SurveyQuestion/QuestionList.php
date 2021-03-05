<?php

namespace App\Http\Livewire\SurveyQuestion;

use App\Models\Question;
use App\Models\Section;
use Livewire\Component;

class QuestionList extends Component
{
    public $selectedSection;
    public $questions;

    protected $listeners = [
        'selectSection'
    ];


    public function render()
    {
        return view('livewire.survey-question.question-list');
    }

    public function selectSection($id)
    {
        $this->selectedSection = Section::with('questions')->find($id);
        $this->questions = $this->selectedSection->questions;
    }

    public function toggleActive(Question $question)
    {
        $question->is_active = !$question->is_active ;
        $question->save();
    }
}
