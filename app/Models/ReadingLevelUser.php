<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingLevelUser extends Model
{
    protected $table = 'reading_level_users';

    protected $fillable = ['level', 'status'];

    public $timestamps = true;

    public function createNewLevelUser($level) {

        if ($this->where('level', '=', $level)->exists()) {
            // level found
            return 'fail';
        }
        else {
            $new_level_user = new ReadingLevelUser();
            $new_level_user->level = $level;
            $new_level_user->save();
            return 'success';
        }
    }

    public function getAllLevelUser() {
        return $this->where('status', 1)->get();
    }
}
