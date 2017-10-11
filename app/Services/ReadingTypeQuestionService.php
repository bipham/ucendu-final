<?php namespace App\Services;

use App\Models\ReadingTypeQuestion;

class ReadingTypeQuestionService {
    private $_readingTypeQuestionModel;

    public function __construct()
    {
        $this->_readingTypeQuestionModel = new ReadingTypeQuestion();
    }

    public function createNewTypeQuestion($name, $level_lesson_id) {
        return $this->_readingTypeQuestionModel->createNewTypeQuestion($name, $level_lesson_id);
    }
}
?>