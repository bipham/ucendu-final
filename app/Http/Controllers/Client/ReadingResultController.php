<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReadingLessonService;

class ReadingResultController extends Controller
{
    public function getReadingViewResultLesson($domain, $string_level_lesson, $string_type_lesson, $string_lesson) {
        //Get para:
        $level_lesson_id = getIdFromLink($string_level_lesson);
        $type_lesson_id = getIdFromLink($string_type_lesson);
        $lesson_id = getIdFromLink($string_lesson);
//        $totalQuestion = $_GET['totalQuestion'];
//        $correct_answer = $_GET['correct_answer'];
//        $list_answer = $_GET['list_answer'];
        $readingLessonService = new ReadingLessonService();
        $lesson = $readingLessonService->getLessonDetailForClientSolutionById($type_lesson_id, $lesson_id);
        if ($lesson->typeQuestion->level_lesson_id == $level_lesson_id) {
            return view('client.readingViewResultLesson', compact('level_lesson_id', 'lesson'));
        }
        else {
            return abort(404);
        }
    }

    public function getResultReadingLesson($domain, $string_level_lesson, $string_type_lesson, $string_lesson) {
        //Get para:
        $level_lesson_id = getIdFromLink($string_level_lesson);
        $type_lesson_id = getIdFromLink($string_type_lesson);
        $lesson_id = getIdFromLink($string_lesson);
        $list_answered = $_GET['list_answer'];
        $quizId = $_GET['quizId'];
        $user_id = Auth::id();
        $correct_answer = [];
        $quizModel = new ReadingQuizz();
        $questionModel = new ReadingQuestion();
        $readingResultModel = new ReadingResult();
        $list_answered_string = '';
        $correct_answer_string = '';
        if ($list_answered != 'emptyList') {
            foreach ($list_answered as $qnumber => $answer_key) {
                $list_answered_string .= $qnumber . '-' . $answer_key . '|';
                $isCorrect = $questionModel->checkAnswerByIdCustom($qnumber, $answer_key);
                if ($isCorrect) {
                    array_push($correct_answer, $qnumber);
                    $correct_answer_string .= $qnumber . '|';
                }
            }
        }

        $number_correct = sizeof($correct_answer);
        $totalQuestion = $quizModel->getTotalQuestionByQuizId($quizId);
        $saveResult = $readingResultModel->saveReadingResultOfUserId($user_id, $quizId, $correct_answer_string, $list_answered_string, $number_correct);

        return json_encode(['correct_answer' => $correct_answer, 'totalQuestion' => $totalQuestion]);
    }
}
