<?php

namespace App\Http\Livewire\Report;

use App\Models\Cluster;
use App\Models\Dealer;
use Carbon\Carbon;
use http\Env\Request;
use Livewire\Component;

class Filter extends Component
{
    public $isFiltering = 0;
    public $dealers, $clusters, $startDate, $endDate, $dealer_id, $cluster_id;

    protected $queryString = ['startDate','endDate', 'dealer_id', 'cluster_id'];


    public function render()
    {
        $this->dealers = Dealer::get()->keyBy('id');
        $this->clusters = Cluster::get()->keyBy('id');
        return view('livewire.report.filter');
    }
}
