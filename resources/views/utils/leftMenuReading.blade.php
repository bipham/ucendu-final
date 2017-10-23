<?php
/**
 * Created by PhpStorm.
 * User: BiPham
 * Date: 9/27/2017
 * Time: 11:40 PM
 */
?>

<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <div class="menu-list">
        <?php
        $readingTypeQuestionService = new App\Services\ReadingTypeQuestionService();
        $readingLessonService = new App\Services\ReadingLessonService();
        $readingLearningTypeQuestionService = new App\Services\ReadingLearningTypeQuestionService();
        $all_lessons = $readingTypeQuestionService->getAllTypeQuestionById($level_lesson_id);
//        dd($all_lessons);
        ?>
        <ul id="menu-content" class="menu-content">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i> Dashboard -
                </a>
            </li>
            <h6 class="title-menu">
                Lessons
            </h6>
            @foreach($all_lessons as $lesson)
                <li  data-toggle="collapse" data-target="#lesson-{!! $lesson->id !!}" class="collapsed">
                    <a href="#"><i class="fa fa-gift fa-lg"></i> {!! $lesson->name !!} <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu sub-level-one collapse" id="lesson-{!! $lesson->id !!}">
                    {{--Show learning:--}}
                    <li data-toggle="collapse" data-target="#learning-{!! $lesson->id !!}" class="collapsed"><a href="#">Learning</a></li>
                    <ul class="sub-menu sub-level-two collapse" id="learning-{!! $lesson->id !!}">
                        <?php
                        $all_learnings = $readingLearningTypeQuestionService->getLearningOfTypeQuestion($lesson->id);
                        ?>
                        @foreach($all_learnings as $learning)
                            <li>{!! $learning->title_section !!}</li>
                        @endforeach
                    </ul>

                    {{--Show practice:--}}
                    <li data-toggle="collapse" data-target="#practice-{!! $lesson->id !!}" class="collapsed"><a href="#">Practices</a></li>
                    <ul class="sub-menu sub-level-two collapse" id="practice-{!! $lesson->id !!}">
                        <?php
                            $all_practices = $readingLessonService->getLessonsByTypeQuestionId(Config('constants.type_lesson.practice'), $lesson->id);
                        ?>
                            @foreach($all_practices as $practice)
                                <li>{!! $practice->title !!}</li>
                            @endforeach
                    </ul>
                </ul>
            @endforeach
        </ul>
    </div>
</div>