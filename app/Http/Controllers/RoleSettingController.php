<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoleSettingController extends Controller
{
    public function index()
    {
        if(!Auth::user()->can('access settings'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);
        return view('setting.role-setting');
    }
}
