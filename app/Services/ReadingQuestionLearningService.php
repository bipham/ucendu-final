<?php namespace App\Services;

use App\Models\ReadingQuestionLearning;

class ReadingQuestionLearningService {
    private $_readingQuestionLearningModel;

    public function __construct()
    {
        $this->_readingQuestionLearningModel = new ReadingQuestionLearning();
    }

    public function getTheLastQuestionCustomId() {
        return $this->_readingQuestionLearningModel->getTheLastQuestionCustomId();
    }

    public function addNewQuestionLearning($learning_type_question_id, $type_question_id, $question_custom_id, $answer, $keyword) {
        return $this->_readingQuestionLearningModel->addNewQuestionLearning($learning_type_question_id, $type_question_id, $question_custom_id, $answer, $keyword);
    }
}
?>