<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReadingQuestionAnswerLessonService;
//use LRedis;

class CommentQuestionController extends Controller
{
    public function createNewComment($domain){
        //Get variables:
        $user_id = $_POST['user_id'];
        $content_cmt = $_POST['content_cmt'];
        $question_custom_id = $_POST['question_custom_id'];
        $reply_comment_id = $_POST['reply_id'];

        $readingQuestionAnswerLessonService = new ReadingQuestionAnswerLessonService();
        $new_comment = $readingQuestionAnswerLessonService->createNewCommentLesson($question_custom_id, $user_id, $reply_comment_id, $content_cmt);
        return json_encode(['new_comment' => $new_comment]);
    }
}
