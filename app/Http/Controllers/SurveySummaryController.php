<?php

namespace App\Http\Controllers;


use App\Exports\SurveyDetailsExport;
use App\Helpers\QueryReport;
use App\Models\Cluster;
use App\Models\Dealer;
use App\Models\Outlet;
use App\Models\Question;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

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

    public function fromOutlet(Outlet $outlet)
    {
        return view('report.list_from_outlet',['outlet'=>$outlet]);
    }

    public function fromUser(User $user)
    {
        return view('report.list_from_user',['user'=>$user]);
    }

    public function exportDetail(Request $request)
    {
        $data = QueryReport::getDetailResponseFromSurveys(
            $request['startDate'] ?? '',
            $request['endDate'] ?? '',
            $request['dealer_id'] ?? 0,
            $request['cluster_id'] ?? 0,
        );
        if ($data->count() > 10000)
            return Redirect::back()->withErrors(['Oops! Data is too big, it\'s more than 10,000 records. Please use filter to make data more specific and smaller']);

        return Excel::download(new SurveyDetailsExport($data), 'surveysDetail.xlsx');
    }

    public function pivot(Request $request)
    {
        $question = Question::where('id',$request['question_id'])->firstOrFail();
        $dealer = Dealer::find($request['dealer_id']);
        $cluster = Cluster::find($request['cluster_id']);
        $data = QueryReport::getDetailResponseFromQuestion(
            $request['question_id'] ?? 0,
            $request['startDate'] ?? '',
            $request['endDate'] ?? '',
            $request['dealer_id'] ?? 0,
            $request['cluster_id'] ?? 0,
        );

        if ($data->count() > 10000)
            return Redirect::back()->withErrors(['Oops! Data is too big, it\'s more than 10,000 records. Please use filter to make data more specific and smaller']);

        return view('layouts.pivot', compact('question','dealer', 'cluster', 'data'));
    }
}
