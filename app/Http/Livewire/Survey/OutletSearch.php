<?php

namespace App\Http\Livewire\Survey;

use App\Models\Outlet;
use Illuminate\Support\Str;
use Livewire\Component;

class OutletSearch extends Component
{
    public $key ;
    public $outlet;

    protected $listeners = [
        'saved' => '$refresh',
    ];
    protected $rules = [
        'key' => 'required|digits_between:10,14|numeric',
    ];
    public function render()
    {
        return view('livewire.survey.outlet-search');
    }

    public function search()
    {
        $this->validate();
        if (Str::substr($this->key,0,2) == '08')
            $this->key = Str::replaceFirst('08','628', $this->key);
        $outlet = Outlet::with(['cluster','dealer','latest_survey'])
            ->where('msisdn',$this->key)->first();

        if(!$outlet)
            session()->flash('notfound','Not Found, Please check your input or try with different numbers');

        $this->outlet = $outlet;
    }



}
