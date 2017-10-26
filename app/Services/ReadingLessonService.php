<?php namespace App\Services;

use App\Models\ReadingPracticeLesson;
use App\Models\ReadingMiniTestLesson;
use App\Models\ReadingMixTestLesson;
use App\Models\ReadingFullTestLesson;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Auth;

class ReadingLessonService {
    private $_readingPracticeLessonModel;
    private $_readingMiniTestLessonModel;
    private $_readingMixTestLessonModel;
    private $_readingFullTestLessonModel;
    private $_adminId;

    public function __construct()
    {
        $this->_readingPracticeLessonModel = new ReadingPracticeLesson();
        $this->_readingMiniTestLessonModel = new ReadingMiniTestLesson();
        $this->_readingMixTestLessonModel = new ReadingMixTestLesson();
        $this->_readingFullTestLessonModel = new ReadingFullTestLesson();
        $this->_adminId = Auth::id();
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
                $result = $this->_readingPracticeLessonModel->addNewPracticeLesson($title, $level_user_id, $content_lesson, $content_highlight, $image_feature, $content_quiz, $content_answer_quiz, $total_questions, $order_lesson, $type_question_id, $this->_adminId);
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

    public function getAllOrderLessonByTypeQuestionId($type_lesson_id, $type_question_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->getAllOrderLessonByTypeQuestionId($type_question_id);
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

    public function updateTitleLesson($type_lesson_id, $lesson_id, $title) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->updateTitlePracticeLesson($lesson_id, $title, $this->_adminId);
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

    public function updateLevelUserLesson($type_lesson_id, $lesson_id, $level_user_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->updateLevelUserPracticeLesson($lesson_id, $level_user_id, $this->_adminId);
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

    public function updateBasicInfoLesson($type_lesson_id, $lesson_id, $type_question_id, $order_lesson) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->updateBasicInfoPracticeLesson($lesson_id, $type_question_id, $order_lesson, $this->_adminId);
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

    public function getLessonDetailForAdminById($type_lesson_id, $lesson_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->getDetailPracticeLessonForAdminEdit($lesson_id);
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

    public function getLessonDetailForClientTestById($type_lesson_id, $lesson_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->getDetailPracticeLessonForClientTest($lesson_id);
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

    public function getLessonDetailForClientSolutionById($type_lesson_id, $lesson_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->getDetailPracticeLessonForClientSolution($lesson_id);
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

    public function updateContentLesson($type_lesson_id, $lesson_id, $content_lesson, $content_highlight) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->updateContentPracticeLesson($lesson_id, $content_lesson, $content_highlight, $this->_adminId);
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

    public function updateQuizLesson($type_lesson_id, $lesson_id, $content_quiz, $content_answer_quiz, $total_questions) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->updateQuizPracticeLesson($lesson_id, $content_quiz, $content_answer_quiz, $total_questions, $this->_adminId);
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

    public function getLessonsByTypeQuestionId($type_lesson_id, $type_question_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->getPracticesByTypeQuestionId($type_question_id);
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

    public function deleteLesson($type_lesson_id, $lesson_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->deletePracticeLesson($lesson_id);
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

    public function getTotalQuestionByLessonId($type_lesson_id, $lesson_id) {
        switch ($type_lesson_id) {
            case 1:
                $result = $this->_readingPracticeLessonModel->getTotalQuestionOfPracticeLesson($lesson_id);
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
        return $result['total_questions'];
    }
}
?>