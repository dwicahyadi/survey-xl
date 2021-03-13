<?php


namespace App\Helpers;


use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class SaveQuestion
{
    public static function create (int $section_id, string $text, string $type, array $answers = []) : Question
    {
        DB::beginTransaction();
        $question = Question::create(['section_id'=> $section_id, 'text'=>$text,'type'=>$type,'is_active'=>true]);
        if ($type == 'radio_button')
            self::saveAnswer($question, $answers);
        DB::commit();
        return $question;
    }

    public static function saveAnswer(Question $question, array $answers) : void
    {
        $filteredAnswers = array_filter($answers);
        $data = [];
        foreach ($filteredAnswers as $index => $filteredAnswer) {
            array_push($data, ['question_id'=>$question->id, 'text'=>$filteredAnswer['text'], 'index'=>$index, ] );
        }
        Answer::insert($data);
    }
}
