<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReadingLevelLessonService;
use App\Services\ReadingTypeQuestionService;
use App\Services\ReadingPracticeLessonService;
use App\Services\ReadingQuestionLessonService;
use App\Services\ReadingImageService;
use App\Services\ReadingLessonService;
use App\Services\ReadingLevelUserService;
use League\Flysystem\Config;

class ReadingPracticeController extends Controller
{
    public function getCreateNewReadingPractice() {
        $readingLevelLessonService = new ReadingLevelLessonService();
        $all_level_lessons = $readingLevelLessonService->getAllLevelLesson();
        $first_level_lesson_id = $readingLevelLessonService->getFirstLevelLesson();
        $readingTypeQuestionService = new ReadingTypeQuestionService();
        $all_type_questions = $readingTypeQuestionService->getAllTypeQuestionById($first_level_lesson_id->id);
        $readingQuestionLessonServicee = new ReadingQuestionLessonService();
        $last_question_custom_id = $readingQuestionLessonServicee->getTheLastQuestionCustomId();
        $readingLevelUserService = new ReadingLevelUserService();
        $all_level_users = $readingLevelUserService->getAllLevelUser();
        return view('admin.readingUploadNewPractice', compact('last_question_custom_id', 'all_type_questions', 'all_level_lessons', 'all_level_users'));
    }

    /**
     * @param ClientUpRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateNewReadingPractice(Request $request)
    {
        //Get variable:
        $img_url = $_POST['img_url'];
        $img_name_no_ext = $_POST['img_name_no_ext'];
        $img_extension = $_POST['img_extension'];
        $content_lesson = $_POST['content_post'];
        $content_highlight = $_POST['content_highlight'];
        $content_quiz = $_POST['content_quiz'];
        $content_answer_quiz = $_POST['content_answer_quiz'];
        $list_answer = $_POST['list_answer'];
        $title = $_POST['title_post'];
        $type_question_id = $_POST['type_question_id'];
        $list_type_questions = $_POST['list_type_questions'];
        $level_user_id = $_POST['level_user_id'];
        $order_lesson = $_POST['order_lesson'];
        $listKeyword = $_POST['listKeyword'];
        $total_questions = sizeof($list_answer);
        $readingLessonService = new ReadingLessonService();
        $current_lesson_id = $readingLessonService->getTheCurrentLessonId(Config('constants.type_lesson.practice'));

        //Function save img:
        $readingImageService = new ReadingImageService();
        $image_feature = $readingImageService->saveImageToLocal($img_name_no_ext, $img_url, $img_extension, $current_lesson_id);

        //Save Practice Lesson to DB:
        $lesson_id = $readingLessonService->addNewReadingLesson(Config('constants.type_lesson.practice'), $title, $level_user_id, $content_lesson, $content_highlight, $image_feature, $content_quiz, $content_answer_quiz, $total_questions, $order_lesson, $type_question_id);

        //Save questions - answers:
        if ($lesson_id != 'fail-order') {
            foreach ($list_answer as $question_custom_id => $answer) {
                $readingQuestionLessonService = new ReadingQuestionLessonService();
                $readingQuestionLessonService->addNewQuestionLesson(Config('constants.type_lesson.practice'), $lesson_id, $type_question_id, $question_custom_id, $answer, $listKeyword[$question_custom_id]);
            }
            $result = 'success';
        }
        else $result = 'fail-order';

        return json_encode(['result' => $result]);
    }

    public function getEditPracticeLessonReading($domain, $lesson_id) {
        $readingQuestionLessonService = new ReadingQuestionLessonService();
        $last_question_custom_id = $readingQuestionLessonService->getTheLastQuestionCustomId();
        $readingLessonService = new ReadingLessonService();
        $lesson = $readingLessonService->getLessonDetailById(Config('constants.type_lesson.practice'), $lesson_id);
//        dd($lesson);
        return view('admin.readingEditPracticeLesson',compact('last_question_custom_id', 'lesson'));
    }
}
