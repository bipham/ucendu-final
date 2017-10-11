<?php namespace App\Services;

use App\Models\ReadingLevelLesson;

class ReadingLevelLessonService {
    private $_readingLevelLessonModel;

    public function __construct()
    {
        $this->_readingLevelLessonModel = new ReadingLevelLesson();
    }

    public function createNewLevelLesson($level) {
        return $this->_readingLevelLessonModel->createNewLevelLesson($level);
    }
}
?>



