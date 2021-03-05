<?php

namespace App\Http\Livewire\Survey;

use App\Models\Outlet;
use Livewire\Component;

class OutletSearch extends Component
{
    public $key ;
    public $outlet;

    public function render()
    {
        return view('livewire.survey.outlet-search');
    }

    public function search()
    {
        $outlet = Outlet::with(['cluster','dealer','latest_survey'])
            ->where('msisdn',$this->key)->first();

        if(!$outlet)
            session()->flash('notfound','Not Found, Please your input or try with different numbers');

        $this->outlet = $outlet;
    }


}
