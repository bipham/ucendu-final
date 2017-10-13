<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReadingLessonService;
use App\Services\ReadingLevelLessonService;

class ReadingLessonController extends Controller
{
    public function managerReadingLesson() {
        $readingLevelLessonService = new ReadingLevelLessonService();
        $all_level_lessons = $readingLevelLessonService->getAllLevelLesson();
        $readingLessonService = new ReadingLessonService();
        $lessons = $readingLessonService->getAllLesson();
//        foreach ($lessons['practice'] as $lesson) {
////            dd($lesson->typeQuestion->levelLesson->level);
//        }

        return view('admin.readingManagerLessons', compact('lessons', 'all_level_lessons'));
    }

    public function updateTitleLesson($domain, $type_lesson_id, $lesson_id) {
        //Get variable:
        $title_lesson = $_POST['title_lesson'];
        $readingLessonService = new ReadingLessonService();
        $result = $readingLessonService->updateTitleLesson($type_lesson_id, $lesson_id, $title_lesson);
        return json_encode(['result' => $result]);
    }
}
