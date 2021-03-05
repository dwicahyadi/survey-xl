<?php

namespace App\Http\Livewire\Dealer;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
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

        return view('livewire.dealer.user-list',[
        'users' => User::where('dealer_id',$this->dealerId)
            ->where('name','like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
}
