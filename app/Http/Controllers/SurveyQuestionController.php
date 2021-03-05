<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SurveyQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        if(!Auth::user()->can('manage questions'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);
        $sections = Section::with('questions')->withCount('questions')->get();
        return view('survey-question.index', ['sections'=>$sections]);
    }
    public function create(Section $section)
    {
        return view('survey-question.create-question', ['section'=>$section]);
    }
}
