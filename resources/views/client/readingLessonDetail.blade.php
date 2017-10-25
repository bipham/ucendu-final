<?php
/**
 * Created by PhpStorm.
 * User: BiPham
 * Date: 7/18/2017
 * Time: 8:30 PM
 */
//dd($practice_lessons);
?>
@extends('layout.masterNoFooterClient')
@section('meta-title')

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/client/readingNavtabsVertical.css')}}">
@endsection

@section('titleTypeLesson')
    {!! $lesson->title !!}
@endsection

@section('typeLessonHeader')
    {!! $lesson->typeQuestion->name !!}
@endsection

@section('content')
    @include('utils.readingLessonTestTools',['lesson' => $lesson])
    <div class="container lesson-detail-page page-custom">
        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
        <div class="lesson-detail panel-container">
            <div class="left-panel-custom panel-left panel-top" id="lesson-content-area" data-lessonid="{!! $lesson->id !!}">
                {!! $lesson->content_lesson !!}
            </div>
            <div class="splitter">
            </div>
            <div class="splitter-horizontal">
            </div>
            <div class="right-panel-custom panel-right panel-bottom active-quiz" id="quiz-test-area" data-quizId="{!! $lesson->id !!}">
                {!! $lesson->content_quiz !!}
                <div class="reading-end-lesson end-lesson-area">
                    <h4 class="title-end-lesson">
                        --- End of the Test ---
                    </h4>
                    <h5 class="recomment-submit-lesson">
                        Please Submit to view your score, solution and explanations.
                    </h5>
                    <button type="submit" class="btn btn-danger btn-submit-modal btn-custom" data-toggle="modal" data-target="#readingSubmitQuizModal">
                        Submit
                    </button>
                    <div class="found-mistake">
                        <a href="#" class="send-mistake">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            Found a mistake? Let us know!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('public/js/client/lessonDetail.js')}}"></script>
    <script src="{{asset('public/libs/countdown/jquery.countdown.js')}}"></script>
@endsection
