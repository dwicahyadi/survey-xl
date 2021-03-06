<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Auth::user()->can('manage all dealers'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);

        return view('dealer.index');
    }

    public function show(Dealer $dealer)
    {
        return view('dealer.show',['dealer'=>$dealer]);
    }


}
