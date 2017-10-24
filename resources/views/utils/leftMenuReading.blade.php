<?php
/**
 * Created by PhpStorm.
 * User: BiPham
 * Date: 9/27/2017
 * Time: 11:40 PM
 */
?>

<div class="nav-side-menu">
    <div class="menu-list">
        <?php
        $readingTypeQuestionService = new App\Services\ReadingTypeQuestionService();
        $readingLessonService = new App\Services\ReadingLessonService();
        $readingLearningTypeQuestionService = new App\Services\ReadingLearningTypeQuestionService();
        $readingLevelLessonService = new App\Services\ReadingLevelLessonService();
        $all_level_lessons = $readingLevelLessonService->getAllLevelLesson();
        $current_level_lesson = $readingLevelLessonService->getLevelLessonById($level_lesson_id);
        $all_lessons = $readingTypeQuestionService->getAllTypeQuestionById($level_lesson_id);
//        dd($all_lessons);
        ?>
        <div class="header-left-menu">
            <div class="center-class logo-webstite">
                <a href="{{url('/')}}" class="brand-web">
                    <img src="{{url('/public/imgs/original/logo.jpg')}}" alt="Logo" class="img-custom img-logo-website">
                </a>
            </div>
        </div>
        <div class="body-left-menu">
            <div class="top-menu">
                <h3 class="level-lesson-current">
                    {!! $current_level_lesson->level !!}
                </h3>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        @foreach($all_level_lessons as $level_lesson)
                            <li><a href="#">{!! $level_lesson->level !!}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <ul id="menu-content" class="menu-content">
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
</div>