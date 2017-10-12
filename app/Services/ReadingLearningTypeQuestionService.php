<?php namespace App\Services;

use App\Models\ReadingLearningTypeQuestion;

class ReadingLearningTypeQuestionService {
    private $_readingLearningTypeQuestionModel;

    public function __construct()
    {
        $this->_readingLearningTypeQuestionModel = new ReadingLearningTypeQuestion();
    }

    public function createNewLearningTypeQuestion($type_question_id, $title_section, $step_section, $view_layout, $icon, $content_section, $left_content, $right_content) {
        return $this->_readingLearningTypeQuestionModel->createNewLearningTypeQuestion($type_question_id, $title_section, $step_section, $view_layout, $icon, $content_section, $left_content, $right_content);
    }
}
?>