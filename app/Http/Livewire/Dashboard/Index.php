<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Cluster;
use App\Models\Dealer;
use App\Models\Outlet;
use App\Models\Question;
use App\Models\Section;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $dealersCount, $clustersCount, $outletsCount, $usersCount, $sectionsCount, $questionsCount;
    public $pieChartSectionData = [];

    public function render()
    {
        $sections = Section::withCount('questions');
        $this->dealersCount = Dealer::count();
        $this->clustersCount = Cluster::count();
        $this->outletsCount = Outlet::count();
        $this->usersCount = User::count();
        $this->sectionsCount = $sections->count();
        $this->questionsCount = Question::count();

        foreach ($sections->get() as $section) {
            array_push($this->pieChartSectionData, ['name'=>trim($section->name), 'value'=>$section->questions_count]);
        }

        return view('livewire.dashboard.index');
    }
}
