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
    public $surveyor = 0;

    public $dealerId, $outletId, $userId;

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
        $surveys = Survey::with(['user','outlet','cluster','dealer'])
            ->whereHas('outlet', function ($q){
                $q->where('msisdn','like', '%'.$this->search.'%')
                    ->orWhere('name','like', '%'.$this->search.'%');
            })
            ->orderBy('id','desc');
        if($this->surveyor)
            $surveys->where('user_id', \Auth::id());

        if($this->outletId)
            $surveys->where('outlet_id', $this->outletId);

        if($this->userId)
            $surveys->where('user_id', $this->userId);

        return view('livewire.survey.survey-list',[
            'surveys' => $surveys->paginate(10),
        ]);
    }
}
