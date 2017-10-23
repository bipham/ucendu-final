<?php
/**
 * Created by PhpStorm.
 * User: nobikun1412
 * Date: 10/23/2017
 * Time: 3:29 PM
 */
?>
@extends('layout.masterNoFooterClient')
@section('meta-title')
    Home
@endsection

@section('css')
    <?php
    $bg = array('1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '15.jpg');
    $i = rand(0, count($bg)-1); // generate random number size of the array
    $i2 = rand(0, count($bg)-1); // generate random number size of the array
    $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
    $selectedBg2 = "$bg[$i2]"; // set variable equal to which random filename was chosen
    ?>
    <style type="text/css">
        .outer-banner-custom {
            background: url(/public/imgs/background-header/<?php echo $selectedBg2; ?>);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header-product {
            background: url(/public/imgs/background-header/<?php echo $selectedBg; ?>);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section('banner-page')
    <div class="row-fluid outer-banner-custom">
        <div class="breadcrumb-header middle-banner-custom">
            <div class="content-breadcrumb-header content-banner-custom">
                <h2 class="title-post">READING IELTS</h2>
                {{--<ol class="breadcrumb" id="path">--}}
                {{--<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>--}}
                {{--<li class="breadcrumb-item"><a href="{{url('/')}}">Tin tìm mua</a></li>--}}
                {{--<li class="breadcrumb-item"><a href="{{url('/')}}">asd</a></li>--}}
                {{--</ol>--}}
            </div>
        </div>
    </div>
@endsection
{{--@include('utils.toolbarReadingLesson')--}}

@section('titleTypeLesson')
    READING IELTS
@endsection

@section('readingIntro')

@endsection

@section('readingPractice')
    <div class="container reading-page page-custom">
        <div class="list-reading-thumbnail">
            <div class="row list-lesson-thumbnail">

            </div>
        </div>
    </div>
@endsection

@section('readingTest')
    <div class="container reading-page page-custom">
        <div class="list-reading-thumbnail">
            <div class="row list-lesson-thumbnail">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#myTabReading a.reading-intro').tab('show');
//            $('#myTabReading a.reading-intro').addClass('hidden');
            $('#myTabReading a.reading-test-quiz').addClass('hidden');
            $('#myTabReading a.reading-solution-quiz').addClass('hidden');
        })
    </script>
@endsection