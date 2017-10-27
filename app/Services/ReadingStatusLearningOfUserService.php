<?php namespace App\Services;

use App\Models\ReadingStatusLearningOfUser;
use Illuminate\Support\Facades\Auth;

class ReadingStatusLearningOfUserService
{
    private $_readingStatusLearningOfUserModel;
    private $_adminId;

    public function __construct()
    {
        $this->_readingStatusLearningOfUserModel = new ReadingStatusLearningOfUser();
        $this->_adminId = Auth::id();
    }

    public function getHighestCurrentStep($type_lesson_id, $lesson_id) {
//        $result = $this->_readingStatusLearningOfUserModel->getHighestCurrentStep($this->_adminId, );
    }

}
?>