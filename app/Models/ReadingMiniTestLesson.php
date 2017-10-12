<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingMiniTestLesson extends Model
{
    public function getTheCurrentLessonId() {
        return $this->orderBy('id', 'desc')->first();
    }
    public function addNewReadingLesson() {

    }
}
