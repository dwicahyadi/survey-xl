<?php


namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class QueryReport
{
    public static function summaryResponseFromQuestion(int $question_id): \Illuminate\Support\Collection
    {
        return DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->select(DB::raw('response as name, count(answer_question_survey.id) as value'))
            ->where('question_id',$question_id)
            ->groupBy('name')
            ->get();
    }


    public static function getResponseNumberFromQuestion(int $question_id): \Illuminate\Support\Collection
    {
        return DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->select(DB::raw('response as value'))
            ->where('question_id',$question_id)
            ->get();
    }

    public static function getResponseTextFromQuestion(int $question_id): \Illuminate\Support\Collection
    {
        return DB::table('answer_question_survey')
            ->join('surveys','answer_question_survey.survey_id','=','surveys.id')
            ->select(DB::raw('response as value'))
            ->where('question_id',$question_id)
            ->limit(10)
            ->orderBy('answer_question_survey.id','desc')
            ->get();
    }
}
