<?php

namespace App\Models;

use App\Services\ReadingLevelLessonService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReadingLevelLesson extends Model
{
    protected $table = 'reading_level_lessons';

    protected $fillable = ['level', 'status'];

    public $timestamps = true;

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
}
