<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dealer.index');
    }

    public function show(Dealer $dealer)
    {
        return view('dealer.show',['dealer'=>$dealer]);
    }


}
