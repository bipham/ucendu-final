<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingStatusLearningOfUser extends Model
{
    protected $table = 'reading_status_learning_of_users';

    protected $fillable = ['user_id', 'type_question_id', 'type_lesson_id', 'step_current', 'status'];

    public $timestamps = true;

    public function getHighestCurrentStep($lesson_id) {
        return $this->where('user_id', $lesson_id)->select('order_lesson')->get()->first();
    }
}
