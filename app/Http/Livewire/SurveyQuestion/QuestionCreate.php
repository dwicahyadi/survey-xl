<?php

namespace App\Http\Livewire\SurveyQuestion;

use App\Helpers\SaveQuestion;
use App\Models\Question;
use Livewire\Component;

class QuestionCreate extends Component
{
    public $response_types = ['radio_button','input_number','input_text','file'];
    public $section_id, $type, $text;
    public $answers = [];

    protected $rules = [
        'text' => 'required|min:6|unique:questions',
        'type' => 'required|min:4',
    ];

    public function mount($section_id)
    {
        $this->section_id = $section_id;
    }


    public function render()
    {
        return view('livewire.survey-question.question-create');
    }

    public function save()
    {
        $this->validate();
        SaveQuestion::create($this->section_id, $this->text, $this->type, $this->answers);
        session()->flash('question_message', 'Added new Question');
        return $this->redirect(route('survey-question.create-question', ['section'=>$this->section_id]));
    }
}
