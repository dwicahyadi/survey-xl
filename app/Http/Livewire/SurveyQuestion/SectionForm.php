<?php

namespace App\Http\Livewire\SurveyQuestion;

use App\Models\Section;
use Livewire\Component;

class SectionForm extends Component
{
    public $name;

    protected $listeners = ['saved' => '$refresh'];

    protected $rules = [
        'name' => 'required|min:6|unique:sections',
    ];

    public function render()
    {
        return view('livewire.survey-question.section-form');
    }

    public function save()
    {
        $this->validate();
        Section::create(['name'=>$this->name]);
        $this->clear();
        $this->emit('saved');
        session()->flash('message', 'Added new section.');

    }

    private function clear()
    {
        $this->name = '';
    }
}
