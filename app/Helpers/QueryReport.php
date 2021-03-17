<?php


namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class QueryReport
{
    public static function summaryResponseFromQuestion(int $question_id, string $start_date = '', string $end_date, int $dealer_id = 0, int $cluster_id = 0): \Illuminate\Support\Collection
    {
        $query =  DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->select(DB::raw('response as name, count(answer_question_survey.id) as value'))
            ->where('question_id',$question_id)
            ->groupBy('name');

        if ($dealer_id)
            $query->where('dealer_id', $dealer_id);

        if ($cluster_id)
            $query->where('cluster_id', $cluster_id);

        if ($start_date)
            $query->whereDate('surveys.created_at','>=', $start_date);

        if ($end_date)
            $query->whereDate('surveys.created_at','<=', $end_date);

        return $query->get();
    }


    public static function getResponseNumberFromQuestion(int $question_id, string $start_date = '', string $end_date, int $dealer_id = 0, int $cluster_id = 0): \Illuminate\Support\Collection
    {
        $query =  DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->select(DB::raw('response as value'))
            ->where('question_id',$question_id);

        if ($dealer_id)
            $query->where('dealer_id', $dealer_id);

        if ($cluster_id)
            $query->where('cluster_id', $cluster_id);

        if ($start_date)
            $query->whereDate('surveys.created_at','>=', $start_date);

        if ($end_date)
            $query->whereDate('surveys.created_at','<=', $end_date);

        return $query->get();
    }

    public static function getResponseTextFromQuestion(int $question_id, string $start_date = '', string $end_date, int $dealer_id = 0, int $cluster_id = 0): \Illuminate\Support\Collection
    {
        $query = DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->select(DB::raw('response as value'))
            ->where('question_id',$question_id)
            ->limit(10)
            ->orderBy('answer_question_survey.id','desc');
        if ($dealer_id)
            $query->where('dealer_id', $dealer_id);

        if ($cluster_id)
            $query->where('cluster_id', $cluster_id);

        if ($start_date)
            $query->whereDate('surveys.created_at','>=', $start_date);

        if ($end_date)
            $query->whereDate('surveys.created_at','<=', $end_date);

        return $query->get();
    }


    public static function getDetailResponseFromSurveys(string $start_date, string $end_date, int $dealer_id = 0, int $cluster_id = 0): \Illuminate\Support\Collection
    {
        $query =  DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->join('questions','answer_question_survey.question_id','=','questions.id')
            ->join('users','surveys.user_id','=','users.id')
            ->join('dealers','surveys.dealer_id','=','dealers.id')
            ->join('clusters','surveys.cluster_id','=','clusters.id')
            ->join('outlets','surveys.outlet_id','=','outlets.id')
            ->select(DB::raw('surveys.created_at as DateTime,
            surveys.id as SurveyID,
            users.name as Surveyor,
            dealers.name as Dealer,
            clusters.name as Cluster,
            outlets.micro_cluster as "Micro Cluster",
            outlets.province as Province,
            outlets.city as City,
            outlets.subdistrict as Subdistrict,
            outlets.msisdn as MSISDN,
            outlets.name as "Outlet Name",
            outlets.type as "Outlet Type",
            questions.text as Questions,
            response as Response,
            status as "Status"
            '));

        if ($dealer_id)
            $query->where('surveys.dealer_id', $dealer_id);

        if ($cluster_id)
            $query->where('surveys.cluster_id', $cluster_id);

        if ($start_date)
            $query->whereDate('surveys.created_at','>=', $start_date);

        if ($end_date)
            $query->whereDate('surveys.created_at','<=', $end_date);

        return $query->get();
    }

    public static function getDetailResponseFromQuestion(int $question_id, string $start_date, string $end_date, int $dealer_id = 0, int $cluster_id = 0): \Illuminate\Support\Collection
    {
        $query =  DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->join('questions','answer_question_survey.question_id','=','questions.id')
            ->join('users','surveys.user_id','=','users.id')
            ->join('dealers','surveys.dealer_id','=','dealers.id')
            ->join('clusters','surveys.cluster_id','=','clusters.id')
            ->join('outlets','surveys.outlet_id','=','outlets.id')
            ->select(DB::raw('surveys.created_at as DateTime,
            surveys.id as SurveyID,
            users.name as Surveyor,
            dealers.name as Dealer,
            clusters.name as Cluster,
            outlets.micro_cluster as "Micro Cluster",
            outlets.province as Province,
            outlets.city as City,
            outlets.subdistrict as Subdistrict,
            outlets.msisdn as MSISDN,
            outlets.name as "Outlet name",
            outlets.type as "Outlet Type",
            response as Response,
            status as "Status"
            '));

        if ($dealer_id)
            $query->where('surveys.dealer_id', $dealer_id);

        if ($cluster_id)
            $query->where('surveys.cluster_id', $cluster_id);

        if ($start_date)
            $query->whereDate('surveys.created_at','>=', $start_date);

        if ($end_date)
            $query->whereDate('surveys.created_at','<=', $end_date);

        return $query->where('answer_question_survey.question_id', $question_id)->get();
    }

    public static function getSurveyResponse(int $survey_id)
    {
        $query =  DB::table('answer_question_survey')
            ->where('answer_question_survey.survey_id', $survey_id)
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->join('questions','answer_question_survey.question_id','=','questions.id')
            ->join('sections','questions.section_id','=','sections.id')
            ->select(DB::raw('answer_question_survey.*,
            questions.section_id,
            sections.name as section,
            questions.text as question,
            questions.type as question_type'));

        return $query->get();

    }
}
