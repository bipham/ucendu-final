<?php namespace App\Services;

use App\Models\ReadingUser;

class UcenduUserService
{
    private $_readingUserModel;

    public function __construct()
    {
        $this->_readingUserModel = new ReadingUser();
    }

    public function createNewUser($username, $email, $password, $level_user_id, $avatar, $remember_token)
    {
        return $this->_readingUserModel->createNewUser($username, $email, $password, $level_user_id, $avatar, $remember_token);
    }
}
?>