<?php

namespace App\Http\Livewire\Setting;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

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

        return view('livewire.setting.user-list',[
        'users' => User::with('roles.permissions','dealer')
            ->where('name','like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
}
