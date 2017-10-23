<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReadingPracticeLesson extends Model
{
    protected $table = 'reading_practice_lessons';

    protected $fillable = ['title', 'level_user_id', 'content_lesson', 'content_highlight', 'image_feature', 'content_quiz', 'content_answer_quiz', 'total_questions', 'order_lesson', 'type_question_id', 'status'];

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

    public function addNewPracticeLesson($title, $level_user_id, $content_lesson, $content_highlight, $image_feature, $content_quiz, $content_answer_quiz, $total_questions, $order_lesson, $type_question_id) {
        if ($this->where('type_question_id', $type_question_id)->where('order_lesson', $order_lesson)->exists()) {
            return 'fail-order';
        }
        else {
            $new_reading_lesson = new ReadingPracticeLesson();
            $new_reading_lesson->title = $title;
            $new_reading_lesson->level_user_id = $level_user_id;
            $new_reading_lesson->content_lesson = $content_lesson;
            $new_reading_lesson->content_highlight = $content_highlight;
            $new_reading_lesson->image_feature = $image_feature;
            $new_reading_lesson->content_quiz = $content_quiz;
            $new_reading_lesson->content_answer_quiz = $content_answer_quiz;
            $new_reading_lesson->total_questions = $total_questions;
            $new_reading_lesson->order_lesson = $order_lesson;
            $new_reading_lesson->type_question_id = $type_question_id;
            $new_reading_lesson->save();
            return $new_reading_lesson->id;
        }

    }

    public function getAllPracticeLesson() {
        return $this->where('status',1)->orderBy('updated_at','desc')->select('id', 'title', 'level_user_id', 'image_feature', 'order_lesson', 'type_question_id')->get()->all();
    }

    public function updateTitlePracticeLesson($lesson_id, $title) {
        if ($this->where('id', $lesson_id)->where('title', $title)->exists()) {
            return 'title-not-change';
        }
        else {
            $this->where('id', $lesson_id)->update(['title' => $title, 'updated_at' => Carbon::now()]);
            return 'update-success';
        }
    }

    public function updateContentPracticeLesson($lesson_id, $content_lesson, $content_highlight) {
        $this->where('id', $lesson_id)->update(['content_lesson' => $content_lesson, 'content_highlight' => $content_highlight ,'updated_at' => Carbon::now()]);
        return 'update-success';
    }

    public function updateQuizPracticeLesson($lesson_id, $content_quiz, $content_answer_quiz, $total_questions) {
        $this->where('id', $lesson_id)->update(['content_quiz' => $content_quiz, 'content_answer_quiz' => $content_answer_quiz, 'total_questions' => $total_questions,'updated_at' => Carbon::now()]);
        return 'update-success';
    }

    public function updateLevelUserPracticeLesson($lesson_id, $level_user_id) {
        if ($this->where('id', $lesson_id)->where('level_user_id', $level_user_id)->exists()) {
            return 'level-user-not-change';
        }
        else {
            $this->where('id', $lesson_id)->update(['level_user_id' => $level_user_id, 'updated_at' => Carbon::now()]);
            return 'update-success';
        }
    }

    public function updateBasicInfoPracticeLesson($lesson_id, $type_question_id, $order_lesson) {
        if ($this->where('type_question_id', $type_question_id)->where('order_lesson', $order_lesson)->exists()) {
            return 'order-fail';
        }
        else {
            $this->where('id', $lesson_id)->update(['type_question_id' => $type_question_id, 'order_lesson' => $order_lesson, 'updated_at' => Carbon::now()]);
            return 'update-success';
        }
    }

    public function getAllOrderLessonByTypeQuestionId($type_question_id) {
        return $this->where('type_question_id', $type_question_id)->orderBy('order_lesson','asc')->select('order_lesson')->get()->all();
    }

    public function getDetailPracticeLesson($lesson_id) {
        return $this->where('status', 1)->where('id', $lesson_id)->select('id', 'content_lesson', 'content_highlight', 'content_quiz', 'content_answer_quiz', 'type_question_id')->get()->first();
    }
}
