<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $dealer_id = $user->dealer_id;
        if ($dealer_id > 0)
            $dealer = Dealer::withCount(['users','outlets'])->find($dealer_id);

        if ($user->hasRole('super admin') || $user->hasRole('principle'))
            return view('dashboard.main');

        if ($user->hasRole('admin dealer'))
            return view('dashboard.admin',['dealer'=>$dealer ?? null]);

        if ($user->hasRole('surveyor'))
            return view('survey.surveyor.index');
    }
}
