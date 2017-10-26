<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReadingLessonService;
use Illuminate\Support\Facades\Auth;

class ReadingLessonController extends Controller
{
    public function index($domain, $string_level_lesson)
    {
        $level_lesson_id = getIdFromLink($string_level_lesson);
        return view('client.readingOverview', compact('level_lesson_id'));
    }

    public function readingLessonDetail($domain, $string_level_lesson, $string_type_lesson, $string_lesson) {
        $level_lesson_id = getIdFromLink($string_level_lesson);
        $type_lesson_id = getIdFromLink($string_type_lesson);
        $lesson_id = getIdFromLink($string_lesson);
        $readingLessonService = new ReadingLessonService();
        $lesson = $readingLessonService->getLessonDetailForClientTestById($type_lesson_id, $lesson_id);
        if ($lesson->typeQuestion->level_lesson_id == $level_lesson_id) {
            return view('client.readingLessonDetail', compact('level_lesson_id', 'lesson', 'type_lesson_id'));
        }
        else {
            return abort(404);
        }
    }
}