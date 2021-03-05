<?php

namespace App\Http\Livewire\Report;

use Carbon\Carbon;
use http\Env\Request;
use Livewire\Component;

class Filter extends Component
{
    public $dealers, $clusters, $startDate, $endDate, $dealer_id, $cluster_id;

    protected $queryString = ['startDate','endDate'];

    public function mount()
    {
        $this->startDate = Carbon::today();
    }

    public function render()
    {
        $this->startDate = Carbon::today();
        return view('livewire.report.filter');
    }
}
