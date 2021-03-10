<?php

namespace App\Http\Controllers;


use App\Exports\SurveyDetailsExport;
use App\Helpers\QueryReport;
use App\Models\Section;
use Illuminate\Http\Request;
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

    public function exportDetail(Request $request)
    {
        $data = QueryReport::getDetailResponseFromSurveys(
            $request['startDate'] ?? '',
            $request['endDate'] ?? '',
            $request['dealer_id'] ?? 0,
            $request['cluster_id'] ?? 0,
        );

        return Excel::download(new SurveyDetailsExport($data), 'surveysDetail.xlsx');
    }
}
