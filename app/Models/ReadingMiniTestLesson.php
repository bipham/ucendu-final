<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingMiniTestLesson extends Model
{
    protected $table = 'reading_mini_test_lessons';

    protected $fillable = ['title', 'level_user_id', 'content_lesson', 'content_highlight', 'image_feature', 'content_quiz', 'content_answer_quiz', 'total_questions', 'order_lesson', 'type_question_id', 'limit_time', 'admin_responsibility', 'status'];

    public $timestamps = true;

    public function typeQuestion()
    {
        return $this->belongsTo('App\Models\ReadingTypeQuestion', 'type_question_id');
    }

    public function levelUser()
    {
        return $this->belongsTo('App\Models\ReadingLevelUser', 'level_user_id');
    }

    public function getTheCurrentLessonId() {
        return $this->orderBy('id', 'desc')->first();
    }

    public function addNewMiniTest($title, $level_user_id, $content_lesson, $content_highlight, $image_feature, $content_quiz, $content_answer_quiz, $total_questions, $order_lesson, $type_question_id, $limit_time, $admin_responsibility) {
        if ($this->where('type_question_id', $type_question_id)->where('order_lesson', $order_lesson)->exists()) {
            return 'fail-order';
        }
        else {
            $new_mini_test = new ReadingMiniTestLesson();
            $new_mini_test->title = $title;
            $new_mini_test->level_user_id = $level_user_id;
            $new_mini_test->content_lesson = $content_lesson;
            $new_mini_test->content_highlight = $content_highlight;
            $new_mini_test->image_feature = $image_feature;
            $new_mini_test->content_quiz = $content_quiz;
            $new_mini_test->content_answer_quiz = $content_answer_quiz;
            $new_mini_test->total_questions = $total_questions;
            $new_mini_test->order_lesson = $order_lesson;
            $new_mini_test->type_question_id = $type_question_id;
            $new_mini_test->limit_time = $limit_time;
            $new_mini_test->admin_responsibility = $admin_responsibility;
            $new_mini_test->save();
            return $new_mini_test->id;
        }
    }

    public function getAllOrderMiniTestByTypeQuestionId($type_question_id) {
        return $this->where('type_question_id', $type_question_id)->where('status', 1)->orderBy('order_lesson','asc')->select('order_lesson')->get()->all();
    }

    public function getAllMiniTest() {
        return $this->where('status',1)->orderBy('updated_at','desc')->select('id', 'title', 'level_user_id', 'image_feature', 'order_lesson', 'type_question_id')->get()->all();
    }
}
