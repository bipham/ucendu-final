<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingLevelLesson extends Model
{
    protected $table = 'reading_level_lessons';

    protected $fillable = ['level', 'status'];

    public $timestamps = true;

    public function typeQuestions()
    {
        return $this->hasMany('App\Models\ReadingTypeQuestion', 'level_lesson_id');
    }

    public function createNewLevelLesson($level) {
        if ($this->where('level', '=', $level)->exists()) {
            // level found
            return 'fail';
        }
        else {
            $new_level_lesson = new ReadingLevelLesson();
            $new_level_lesson->level = $level;
            $new_level_lesson->save();
            return 'success';
        }
    }

    public function getAllLevelLesson() {
        return $this->where('status', 1)->get();
    }
}
