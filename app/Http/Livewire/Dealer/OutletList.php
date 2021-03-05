<?php

namespace App\Http\Livewire\Dealer;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\WithPagination;

class OutletList extends Component
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

        return view('livewire.dealer.outlet-list',[
        'outlets' => Outlet::with(['cluster'])->where('dealer_id',$this->dealerId)
            ->where('msisdn','like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
}
