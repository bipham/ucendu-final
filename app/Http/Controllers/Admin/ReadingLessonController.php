<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReadingLessonService;
use App\Services\ReadingLevelLessonService;
use App\Services\ReadingLevelUserService;

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
        $readingLevelUserService = new ReadingLevelUserService();
        $all_level_users = $readingLevelUserService->getAllLevelUser();
        return view('admin.readingManagerLessons', compact('lessons', 'all_level_lessons', 'all_level_users'));
    }

    public function updateTitleLesson($domain, $type_lesson_id, $lesson_id) {
        //Get variable:
        $title_lesson = $_POST['title_lesson'];
        $readingLessonService = new ReadingLessonService();
        $result = $readingLessonService->updateTitleLesson($type_lesson_id, $lesson_id, $title_lesson);
        return json_encode(['result' => $result]);
    }

    public function updateLevelUserLesson($domain, $type_lesson_id, $lesson_id) {
        //Get variable:
        $level_user_id = $_POST['level_user_id'];
        $readingLessonService = new ReadingLessonService();
        $result = $readingLessonService->updateLevelUserLesson($type_lesson_id, $lesson_id, $level_user_id);
        return json_encode(['result' => $result]);
    }

    public function updateBasicInfoLesson($domain, $type_lesson_id, $lesson_id) {
        //Get variable:
        $type_question_id = $_POST['type_question_id'];
        $order_lesson = $_POST['order_lesson'];
        $readingLessonService = new ReadingLessonService();
        $result = $readingLessonService->updateBasicInfoLesson($type_lesson_id, $lesson_id, $type_question_id, $order_lesson);
        return json_encode(['result' => $result]);
    }
}
