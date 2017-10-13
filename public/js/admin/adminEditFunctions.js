/**
 * Created by BiPham on 10/13/2017.
 */
var ajaxUpdateTitleLesson = baseUrl + '/updateTitleLesson/';

function updateTitleLesson(type_lesson_id, lesson_id) {
    ajaxUpdateTitleLesson += type_lesson_id + '-' + lesson_id;
    var title_lesson = $('#titleLesson' + lesson_id).val().trim();
    if (title_lesson != '') {
        $.ajax({
            type: "POST",
            url: ajaxUpdateTitleLesson,
            dataType: "json",
            data: { title_lesson: title_lesson },
            success: function (data) {
                bootbox.alert({
                    message: "Update title lesson success!",
                    backdrop: true,
                    callback: function(){
                        location.href= baseUrl + '/managerReadingLesson';
                    }
                });
            },
            error: function (data) {
                bootbox.alert({
                    message: "Update title lesson fail!",
                    backdrop: true
                });
            }
        });
    }
    else {
        bootbox.alert({
            message: "Title lesson not null!",
            backdrop: true
        });
    }
}