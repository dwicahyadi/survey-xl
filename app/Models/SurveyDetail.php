<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyDetail extends Model
{
    use HasFactory;

    protected $table = 'answer_question_survey';

    protected $fillable = ['survey_id','question_id','response'];

    public function question(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
