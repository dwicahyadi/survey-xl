<?php


namespace App\Helpers;


use App\Models\Answer;
use App\Models\Question;

class SaveQuestion
{
    public static function create (int $section_id, string $text, string $type, array $answers = []) : Question
    {
        $question = Question::create(['section_id'=> $section_id, 'text'=>$text,'type'=>$type,'is_active'=>true]);
        if ($type == 'radio_button')
            self::saveAnswer($question, $answers);

        return $question;
    }

    public static function saveAnswer(Question $question, array $answers) : void
    {
        $filteredAnswers = array_filter($answers);
        $data = [];
        foreach ($filteredAnswers as $filteredAnswer) {
            array_push($data, ['question_id'=>$question->id, 'text'=>$filteredAnswer] );
        }
        Answer::insert($data);
    }
}
