<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingQuestionLesson extends Model
{
    protected $table = 'reading_question_lessons';

    protected $fillable = ['lesson_id', 'type_lesson_id', 'type_question_id', 'question_custom_id', 'answer', 'keyword', 'status'];

    public $timestamps = true;

    public function getTheLastQuestionCustomId() {
        return $this->orderBy('question_custom_id', 'desc')->first();
    }

    public function addNewQuestionLesson($type_lesson_id, $lesson_id, $type_question_id, $question_custom_id, $answer, $keyword) {
        if ($this->where('question_custom_id', $question_custom_id)->exists()) {
            $this   ->where('question_custom_id', $question_custom_id)
                ->update(['answer' => $answer, 'keyword' => $keyword, 'updated_at' => Carbon::now()]);
        }
        else {
            $new_question_learning = new ReadingQuestionLesson();
            $new_question_learning->lesson_id = $lesson_id;
            $new_question_learning->type_lesson_id = $type_lesson_id;
            $new_question_learning->type_question_id = $type_question_id;
            $new_question_learning->question_custom_id = $question_custom_id;
            $new_question_learning->question_custom_id = $question_custom_id;
            $new_question_learning->answer = $answer;
            $new_question_learning->keyword = $keyword;
            $new_question_learning->save();
            return 'success';
        }
    }
}
