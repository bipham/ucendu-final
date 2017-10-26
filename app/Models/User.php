<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = true;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'level_user_id', 'fullname', 'address', 'city', 'district', 'phone', 'dob', 'avatar','activated', 'admin_responsibility', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createNewUser($username, $email, $password, $level_user_id, $avatar, $remember_token, $admin_responsibility) {
        $new_user = new User();
        $new_user->username = $username;
        $new_user->email = $email;
        $new_user->password = $password;
        $new_user->level_user_id = $level_user_id;
        $new_user->avatar = $avatar;
        $new_user->remember_token = $remember_token;
        $new_user->admin_responsibility = $admin_responsibility;
        $new_user->save();
        return true;
    }
}
