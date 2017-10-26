<?php
/**
 * Created by PhpStorm.
 * User: nobikun1412
 * Date: 10/25/2017
 * Time: 4:16 PM
 */
?>
@extends('layout.masterNoFooterClient')
@section('meta-title')

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/client/readingSolution.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/client/readingNavtabsVertical.css')}}">
@endsection

@section('titleTypeLesson')
    {!! $lesson->title !!}
@endsection

@section('typeLessonHeader')
    {!! $lesson->typeQuestion->name !!}
@endsection

@section('content')
    <div class="container solution-detail-page page-custom">
        {{--@include('utils.readingSolutionTables', ['lesson_detail' => $lesson_detail, 'lesson_quiz' => $lesson_quiz, 'correct_answers' => $correct_answer, 'list_answered' => $list_answer])--}}
        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
        <h4 class="title-solution-detail-section">
            Solution Detail
        </h4>
        <div class="solution-detail panel-container">
            <div class="left-panel-custom panel-left panel-top" id="lesson-highlight-area" data-lessonid="{!! $lesson->id !!}">
                {!! $lesson->content_highlight !!}
            </div>
            <div class="splitter">
            </div>
            <div class="splitter-horizontal">
            </div>
            <div class="right-panel-custom panel-right panel-bottom active-quiz" id="solution-area" data-quizId="{!! $lesson->id !!}">
                {!! $lesson->content_answer_quiz !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('public/js/client/solutionDetail.js')}}"></script>
    <script src="{{asset('public/libs/chart/Chart.min.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection

