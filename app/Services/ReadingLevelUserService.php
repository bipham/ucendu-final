<?php namespace App\Services;

use App\Models\ReadingLevelUser;

class ReadingLevelUserService {
    private $_readingLevelUserModel;

    public function __construct()
    {
        $this->_readingLevelUserModel = new ReadingLevelUser();
    }

    public function createNewLevelUser($level) {
        return $this->_readingLevelUserModel->createNewLevelUser($level);
    }
}
?>