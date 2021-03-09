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
}
