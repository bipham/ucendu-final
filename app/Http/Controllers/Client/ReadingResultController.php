<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReadingLessonService;

class ReadingResultController extends Controller
{
    public function getSolutionLesson($domain, $string_level_lesson, $string_type_lesson, $string_lesson) {
        //Get para:
        $level_lesson_id = getIdFromLink($string_level_lesson);
        $type_lesson_id = getIdFromLink($string_type_lesson);
        $lesson_id = getIdFromLink($string_lesson);
        $totalQuestion = $_GET['totalQuestion'];
        $correct_answer = $_GET['correct_answer'];
        $list_answer = $_GET['list_answer'];
        $readingLessonService = new ReadingLessonService();
        $lesson = $readingLessonService->getLessonDetailForClientTestById($type_lesson_id, $lesson_id);
        if ($lesson->typeQuestion->level_lesson_id == $level_lesson_id) {
            return view('client.solutionDetail', compact('level_lesson_id', 'lesson'));
        }
        else {
            return abort(404);
        }
    }
}
