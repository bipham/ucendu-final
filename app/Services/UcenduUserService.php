<?php namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UcenduUserService
{
    private $_readingUserModel;
    private $_adminId;

    public function __construct()
    {
        $this->_readingUserModel = new User();
        $this->_adminId = Auth::id();
    }

    public function createNewUser($username, $email, $password, $level_user_id, $avatar, $remember_token)
    {
//        dd($this->_adminId);
        return $this->_readingUserModel->createNewUser($username, $email, $password, $level_user_id, $avatar, $remember_token, $this->_adminId);
    }
}
?>