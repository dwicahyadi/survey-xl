<?php

namespace App\Http\Controllers;

use App\Helpers\UploadedFileSurvey;
use App\Models\Answer;
use App\Models\Dealer;
use App\Models\Outlet;
use App\Models\Question;
use App\Models\Section;
use App\Models\Survey;
use App\Models\SurveyDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(!Auth::user()->can('access settings'))
            return Redirect::back()->withErrors(['You dont have permission to do that action!']);

        $folder_size = UploadedFileSurvey::getFolderSize();
        $surveys_count = Survey::count();
        $survey_responses_count = SurveyDetail::count();

        return view('setting.index', compact(['folder_size','surveys_count','survey_responses_count']));
    }

    public function deleteOldUploadedImage()
    {
        UploadedFileSurvey::deleteOldImage();
        return redirect()->back();
    }

    public function deleteAllUploadedImage()
    {
        UploadedFileSurvey::deleteOldImage();
        return redirect()->back();
    }

    public function deleteOldSurvey()
    {
        Survey::whereDate('created_at','<=',Carbon::now()->subMonth())->delete();
        SurveyDetail::whereDate('created_at','<=',Carbon::now()->subMonth())->delete();

        return redirect()->back();
    }

    public function deleteAllSurvey()
    {
        Survey::truncate();
        SurveyDetail::truncate();

        return redirect()->back();
    }

    public function deleteAllQuestions()
    {
        Survey::truncate();
        SurveyDetail::truncate();
        Section::truncate();
        Question::truncate();
        Answer::truncate();

        return redirect()->back();
    }

    public function deleteAllDealers()
    {
        Survey::truncate();
        SurveyDetail::truncate();
        Dealer::truncate();
        Outlet::truncate();
        User::where('id','>',1)->delete();
        DB::table('model_has_roles')->where('model_id','!=', 1)->delete();


        return redirect()->back();
    }
}
