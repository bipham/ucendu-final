<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingMixTestLesson extends Model
{
    protected $table = 'reading_mix_test_lessons';

    protected $fillable = ['title', 'level_lesson_id', 'level_user_id', 'content_lesson', 'content_highlight', 'image_feature', 'content_quiz', 'content_answer_quiz', 'total_questions', 'order_lesson', 'limit_time', 'admin_responsibility', 'status'];

    public $timestamps = true;

    public function levelUser()
    {
        return $this->belongsTo('App\Models\ReadingLevelUser', 'level_user_id');
    }

    public function getTheCurrentLessonId() {
        return $this->orderBy('id', 'desc')->first();
    }

    public function addNewMixTest($level_lesson_id, $title, $level_user_id, $content_lesson, $content_highlight, $image_feature, $content_quiz, $content_answer_quiz, $total_questions, $order_lesson, $limit_time, $admin_responsibility) {
        if ($this->where('level_lesson_id', $level_lesson_id)->where('order_lesson', $order_lesson)->exists()) {
            return 'fail-order';
        }
        else {
            $new_mix_test = new ReadingMixTestLesson();
            $new_mix_test->level_lesson_id = $level_lesson_id;
            $new_mix_test->title = $title;
            $new_mix_test->level_user_id = $level_user_id;
            $new_mix_test->content_lesson = $content_lesson;
            $new_mix_test->content_highlight = $content_highlight;
            $new_mix_test->image_feature = $image_feature;
            $new_mix_test->content_quiz = $content_quiz;
            $new_mix_test->content_answer_quiz = $content_answer_quiz;
            $new_mix_test->total_questions = $total_questions;
            $new_mix_test->order_lesson = $order_lesson;
            $new_mix_test->limit_time = $limit_time;
            $new_mix_test->admin_responsibility = $admin_responsibility;
            $new_mix_test->save();
            return $new_mix_test->id;
        }
    }

    public function getAllOrderMixTestByLevelLessonId($level_lesson_id) {
        return $this->where('level_lesson_id', $level_lesson_id)->where('status', 1)->orderBy('order_lesson','asc')->select('order_lesson')->get()->all();
    }
}
