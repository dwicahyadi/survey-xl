<?php

namespace App\Http\Controllers;


use App\Models\Section;

class SurveySummaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sections = Section::with('questions')->whereHas('questions')->get();
        return view('report.summary', compact(['sections']));
    }

    public function list()
    {
        return view('report.list');
    }
}
