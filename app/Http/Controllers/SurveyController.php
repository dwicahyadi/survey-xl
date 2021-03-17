<?php

namespace App\Http\Controllers;

use App\Helpers\QueryReport;
use App\Models\Outlet;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('survey.surveyor.index');
    }

    public function create()
    {
        return view('survey.surveyor.create');
    }

    public function doSurvey(Outlet $outlet)
    {
        if(!Auth::user()->can('survey'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);
        if (!Auth::user()->can('manage all dealers') && Auth::user()->dealer_id != $outlet->dealer_id)
            return Redirect::back()->withErrors(['This outlet is not under your dealer']);

        return view('survey.surveyor.do-survey', ['outlet'=>$outlet]);
    }

    public function surveyList()
    {
        return view('survey.surveyor.list');
    }

    public function showSurvey(int $id)
    {
        $survey = Survey::with('user','outlet','cluster','dealer')
            ->where('id',$id)->firstOrFail();

        $next = Survey::with('user')
            ->where('outlet_id',$survey->outlet_id)
            ->where('id','>',$id)
            ->first();

        $prev = Survey::with('user')
            ->where('outlet_id',$survey->outlet_id)
            ->where('id','<',$id)
            ->orderBy('id','desc')
            ->first();

        $survey_details = QueryReport::getSurveyResponse($id)->groupBy('section');

        return view('survey.surveyor.show-survey', compact('survey','survey_details','prev', 'next'));
    }

}
