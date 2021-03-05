<?php

namespace App\Http\Livewire\SurveyQuestion;

use Livewire\Component;

class QuestionCard extends Component
{
    public $question;

    public function render()
    {
        return view('livewire.survey-question.question-card');
    }

    public function toggleActive()
    {
        $this->question->is_active = !$this->question->is_active;
        $this->question->update();
    }


}
