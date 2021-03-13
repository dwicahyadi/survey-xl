<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DealerUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Dealer $dealer)
    {
        if(!Auth::user()->can('manage a dealer'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);
        return view('dealer.user.index', compact(['dealer']));
    }

    public function destroy(User $user)
    {
        if(!Auth::user()->can('manage a dealer'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);
        $user->delete();

        return redirect()->back();
    }
}
