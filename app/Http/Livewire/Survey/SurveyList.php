<?php

namespace App\Http\Livewire\Survey;

use App\Models\Outlet;
use App\Models\Survey;
use Livewire\Component;
use Livewire\WithPagination;

class SurveyList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public $dealerId;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    protected $listeners = ['saved'=>'$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.survey.survey-list',[
            'surveys' => Survey::with(['user','outlet','cluster','dealer'])
                ->whereHas('outlet', function ($q){
                    $q->where('msisdn','like', '%'.$this->search.'%');
                })
                ->orderBy('id','desc')->paginate(10),
        ]);
    }
}
