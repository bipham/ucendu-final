<?php namespace App\Services;

use App\Models\ReadingPracticeLesson;
use App\Models\ReadingMiniTestLesson;
use App\Models\ReadingMixTestLesson;
use App\Models\ReadingFullTestLesson;
use phpDocumentor\Reflection\Types\Null_;

class ReadingLessonService {
    private $_readingPracticeLessonModel;
    private $_readingMiniTestLessonModel;
    private $_readingMixTestLessonModel;
    private $_readingFullTestLessonModel;

    public function __construct()
    {
        $this->_readingPracticeLessonModel = new ReadingPracticeLesson();
        $this->_readingMiniTestLessonModel = new ReadingMiniTestLesson();
        $this->_readingMixTestLessonModel = new ReadingMixTestLesson();
        $this->_readingFullTestLessonModel = new ReadingFullTestLesson();
    }

    public function getTheCurrentLessonId($type_lesson_id) {
        switch ($type_lesson_id) {
            case 1:
                $last_lesson = $this->_readingPracticeLessonModel->getTheCurrentLessonId();
                break;
            case 2:
                $last_lesson = $this->_readingMiniTestLessonModel->getTheCurrentLessonId();
                break;
            case 3:
                $last_lesson = $this->_readingMixTestLessonModel->getTheCurrentLessonId();
                break;
            case 4:
                $last_lesson = $this->_readingFullTestLessonModel->getTheCurrentLessonId();
                break;
        }
        if (!$last_lesson) {
            $last_lesson_id = 1;
        }
        else {
            $last_lesson_id = $last_lesson->id + 1;
        }
        return $last_lesson_id;
    }

    public function addNewReadingLesson($type_lesson_id, $title, $level_user_id, $content_lesson, $content_highlight, $image_feature, $content_quiz, $content_answer_quiz, $total_questions, $order_lesson, $type_question_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->addNewPracticeLesson($title, $level_user_id, $content_lesson, $content_highlight, $image_feature, $content_quiz, $content_answer_quiz, $total_questions, $order_lesson, $type_question_id);
                break;
            case 2:
                $result = $this->_readingMiniTestLessonModel->addNewReadingLesson();
                break;
            case 3:
                $result = $this->_readingMixTestLessonModel->addNewReadingLesson();
                break;
            case 4:
                $result = $this->_readingFullTestLessonModel->addNewReadingLesson();
                break;
        }
        return $result;
    }

    public function getAllLesson() {
        $lesson['practice'] = $this->_readingPracticeLessonModel->getAllPracticeLesson();
        return $lesson;
    }

    public function updateTitleLesson($type_lesson_id, $lesson_id, $title) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->updateTitlePracticeLesson($lesson_id, $title);
                break;
            case 2:
                $result = $this->_readingMiniTestLessonModel->getTheCurrentLessonId();
                break;
            case 3:
                $result = $this->_readingMixTestLessonModel->getTheCurrentLessonId();
                break;
            case 4:
                $result = $this->_readingFullTestLessonModel->getTheCurrentLessonId();
                break;
        }
        return $result;
    }
}
?>