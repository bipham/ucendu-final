<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingUser extends Model
{
    protected $table = 'reading_users';

    public $timestamps = true;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'level_user_id', 'fullname', 'address', 'city', 'district', 'phone', 'dob', 'avatar','activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createNewUser($username, $email, $password, $level_user_id, $avatar, $remember_token) {
        $new_user = new ReadingUser();
        $new_user->username = $username;
        $new_user->email = $email;
        $new_user->password = $password;
        $new_user->level_user_id = $level_user_id;
        $new_user->avatar = $avatar;
        $new_user->remember_token = $remember_token;
        $new_user->save();
        return true;
    }
}
