<?php
/**
 * Created by PhpStorm.
 * User: BiPham
 * Date: 10/13/2017
 * Time: 10:56 AM
 */
?>
<table id="reading-list-lesson" class="table datatable display manager-lesson-table">
    <thead>
    <tr>
        <th><label><input class="select-all-lessons" name="all-lessons" type="checkbox" value="all"> Chọn</label></th>
        <th>STT </th>
        <th>Title </th>
        <th>Type question </th>
        <th>Level lesson </th>
        <th>Order lesson </th>
        <th>Level user </th>
        <th>Action </th>
    </tr>
    </thead>
    <tbody>
    @foreach($lessons as $key => $lesson)
        <tr class="item_row item-lesson-{!! $lesson->id !!}">
            <td><input type="checkbox" name="item-lesson" value="{!! $lesson->id !!}"></td>
            <td>{!! $key + 1 !!}</td>
            <td>
                @include('components.modals.editTitleLessonModal', ['$lesson' => $lesson, 'type_lesson_id' => config('constants.type_lesson.practice')])
            </td>
            <td>
                <?php
                    $all_type_questions = $lesson->typeQuestion->levelLesson->typeQuestions()->get();
                ?>
                @include('components.modals.editTypeQuestionModal', ['all_level_lessons' => $all_level_lessons, 'all_type_questions' => $all_type_questions, 'lesson' => $lesson, 'type_lesson_id' => config('constants.type_lesson.practice')])
            </td>
            <td>
                @include('components.modals.editLevelLessonModal', ['all_level_lessons' => $all_level_lessons, 'all_type_questions' => $all_type_questions, 'lesson' => $lesson, 'type_lesson_id' => config('constants.type_lesson.practice')])
            </td>
            <td>
                <div class="basic-info info-order-lesson">
                    <h6 class="title-info-custom order-lesson-custom">
                        {!! $lesson->order_lesson !!}
                    </h6>
                    <i class="btn-edit-basic-info fa fa-pencil-square-o" aria-hidden="true" data-id="{!! $lesson->id !!}" data-toggle="modal" data-target="#editInfoBasicReadingLessonModal-{!! $lesson->id !!}"></i>
                </div>
            </td>
            <td>
                <div class="basic-info info-level-user">
                    <h6 class="title-info-custom level-user-custom">
                        {!! $lesson->levelUser->level !!}
                    </h6>
                    <i class="btn-edit-basic-infofa fa-pencil-square-o" aria-hidden="true" data-id="{!! $lesson->id !!}" data-toggle="modal" data-target="#editInfoBasicReadingLessonModal-{!! $lesson->id !!}"></i>
                </div>
            </td>
            <td>
                <a href="{{url('editLessonReading/' . $lesson->id)}}">
                    <button type="button" class="btn btn-info btn-admin-custom btn-edit-lesson" data-id="{!! $lesson->id !!}" onclick="">Edit</button>
                </a>
                <button class="btn btn-danger btn-admin-custom btn-del-lesson" data-id="{!! $lesson->id !!}" onclick="deleteReadingLesson({!! $lesson->id !!})">Del</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
