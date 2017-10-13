<?php
/**
 * Created by PhpStorm.
 * User: BiPham
 * Date: 10/13/2017
 * Time: 4:26 PM
 */
?>
<!-- Button Edit Level Lesson-->
<div class="basic-info info-level-lesson">
    <h6 class="title-info-custom level-lesson-custom">
        {!! $lesson->typeQuestion->levelLesson->level !!}
    </h6>
    <i class="btn-edit-basic-info fa fa-pencil-square-o" aria-hidden="true" data-id="{!! $lesson->id !!}" data-toggle="modal" data-target="#editLevelLessonModal-{!! $lesson->id !!}"></i>
</div>

<!-- Modal Edit Level Lesson-->
<div class="modal fade" id="editLevelLessonModal-{!! $lesson->id !!}" tabindex="-1" data-id="{!! $lesson->id !!}" role="dialog" aria-labelledby="editLevelLessonModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readingReviewQuizModalLabel">
                    Edit level lesson!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    <div class="form-group">
                        <label for="list_level">
                            Select level lesson!
                        </label>
                        <select class="form-control" id="list_level" name="list_level" onchange="getAllTypeQuestionByLevelLessonId()">
                            @foreach($all_level_lessons as $level_lesson)
                                <option value="{!! $level_lesson->id !!}" @if($level_lesson->id == $lesson->typeQuestion->levelLesson->id) selected="selected" @endif>{!! $level_lesson->level !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="list_type_questions">
                            Select type question!
                        </label>
                        <select class="form-control" id="list_type_questions" name="list_type_questions" >
                            @foreach($all_type_questions as $type_question)
                                <option value="{!! $type_question->id !!}">{!! $type_question->name !!}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-update-level-lesson btn-warning">
                    Save
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

