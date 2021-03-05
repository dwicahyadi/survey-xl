<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Cluster;
use App\Models\Dealer;
use App\Models\Outlet;
use App\Models\Question;
use App\Models\Section;
use App\Models\User;
use Livewire\Component;

class Admin extends Component
{
    public $dealer;
    public $outletsCount, $usersCount;
    public $pieChartSectionData = [];

    public function render()
    {
        $this->outletsCount = $this->dealer->outlets_count ?? 0;
        $this->usersCount = $this->dealer->users_count ?? 0;

        return view('livewire.dashboard.admin');
    }
}
