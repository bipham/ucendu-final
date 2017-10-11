<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingTypeQuestion extends Model
{
    protected $table = 'reading_type_questions';

    protected $fillable = ['name', 'level_lesson_id', 'status'];

    public $timestamps = true;

    public function levelLesson()
    {
        return $this->belongsTo('App\Models\ReadingLevelLesson', 'level_lesson_id');
    }

    public function createNewTypeQuestion($name, $level_lesson_id) {
        if ($this->where('name', $name)->where('level_lesson_id', $level_lesson_id)->exists()) {
            // Record found
            return 'fail';
        }
        else {
            $new_type_question = new ReadingTypeQuestion();
            $new_type_question->name = $name;
            $new_type_question->level_lesson_id = $level_lesson_id;
            $new_type_question->save();
            return 'success';
        }
    }
}
