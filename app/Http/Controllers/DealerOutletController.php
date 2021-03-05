<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DealerOutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Dealer $dealer)
    {
        if(!Auth::user()->can('manage a dealer'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);
        if (!Auth::user()->can('manage all dealers') && Auth::user()->dealer_id != $dealer->id)
            return Redirect::back()->withErrors(['You dont have permission to manage this dealer']);
        return view('dealer.outlet.index', compact(['dealer']));
    }
}
