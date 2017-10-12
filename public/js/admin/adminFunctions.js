/**
 * Created by BiPham on 10/11/2017.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('[name="_token"]').val()
    }
});

// Define variable:
var baseUrl = document.location.origin;
var mainUrl = baseUrl.substring(13);
var ajaxGetAllTypeQuestionByLevelLessonId = baseUrl + '/getTypeQuestionByLevelLessonId';

function getAllTypeQuestionByLevelLessonId() {
    var level_lesson_id = $('#list_level').val().trim();
    $.ajax({
        type: "GET",
        url: ajaxGetAllTypeQuestionByLevelLessonId,
        dataType: "json",
        data: { level_lesson_id: level_lesson_id },
        success: function (data) {
            $('#list_type_questions').empty();
            $.each(data.list_type_questions, function (index, type_question) {
                $('#list_type_questions').append('<option value="' + type_question.id + '">' + type_question.name + '</option>');
            })
        },
        error: function (data) {
            bootbox.alert({
                message: "FAIL GET ALL TYPE QUESTION!",
                backdrop: true
            });
        }
    });
}

function readURL(input) {
    img_name = $('input[type=file]').val().split('\\').pop();
    img_extension = img_name.substr( (img_name.lastIndexOf('.') + 1) ).toLowerCase();
    img_name_no_ext = img_name.split('.')[0];
    var allowedExtensions = ['png', 'jpg', 'jpeg', 'gif'];
    if( allowedExtensions.indexOf(img_extension) == -1 ) {
        bootbox.alert({
            message: "Img not true format!",
            backdrop: true
        });
        $('#imgFeature').val('');
        img_name = '';
        img_name_no_ext = '';
        $("#image-main-preview").attr('src', '#');
        $("#image-main-preview").addClass('hidden-class');
        i++;
        return;
    }
    else {
        img_name = $('input[type=file]').val().split('\\').pop();
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#" + input.name + "-preview")
                    .attr('src', e.target.result)
                    .width(150);
                img_url = e.target.result;
                $("#" + input.name + "-preview").removeClass('hidden-class');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
}

function checkStepPost() {
    if (title_post == '') {
        bootbox.alert({
            message: "Please enter name the post!",
            backdrop: true
        });
        return false;
    }
    else if (img_name == '') {
        bootbox.alert({
            message: "Please select image feature!",
            backdrop: true
        });
        return false;
    }
    else if (CKEDITOR.instances["contentPost"].getData() == '') {
        bootbox.alert({
            message: "Please enter the content of post!",
            backdrop: true
        });
        return false;
    }
    else return true;
}

function checkStepQuiz() {
    if (CKEDITOR.instances["contentQuiz"].getData() == '') {
        bootbox.alert({
            message: "Please enter the content of quiz!",
            backdrop: true
        });
        return false;
    }
    else if (level_user_id == 0) {
        bootbox.alert({
            message: "Please select level user!",
            backdrop: true
        });
        return false;
    }
    else if (order_lesson == 0) {
        bootbox.alert({
            message: "Please enter the order lesson!",
            backdrop: true
        });
        return false;
    }
    else return true;
}

// Function:
function checkStepAnswer() {
    listAnswer = {};
    listKeyword = {};
    list_type_questions = {};

    $('.preview-content-quiz .card-block .last-option').each(function () {
        var qnumber = $(this).data('qnumber');
        var qorder = $(this).attr('name');
        qorder = qorder.match(/\d+/);
        var answer_key = $('.answer-' + qorder).val().trim();
        var keywords_key = $('.keyword-' + qorder).val();
        if (answer_key != '') {
            listAnswer[qnumber] = answer_key;
        }
        else {
            delete listAnswer[qnumber];
        }
        if (keywords_key == '') {
            keywords_key = 'No_keywords';
            listClassKeyword[qnumber] = 'hidden-class';
        }
        else {
            listClassKeyword[qnumber] = '';
        }
        listKeyword[qnumber] = keywords_key;

        list_type_questions[qnumber] = type_question_id;
    });
    if ((listQ.length == Object.keys(listAnswer).length) && (listQ.length  == Object.keys(list_type_questions).length)) {
        return true;
    }
    else return false;
}

$(document).on("change", "input.answer-q",function() {
    var qnumber = $(this).data('qnumber');
    listAnswer_source[qnumber] = $(this).val();
});

$(document).on("change", "textarea.input-keyword",function() {
    var qnumber = $(this).data('qnumber');
    listKeyword_source[qnumber] = $(this).val();
    if (listKeyword_source[qnumber] == '') {
        listClassKeyword[qnumber] = 'hidden-class';
    }
    else {
        listClassKeyword[qnumber] = '';
    }
});

$(document).on("change", ".enter-type-question select",function() {
    var qnumber = $(this).data('qnumber');
    list_type_questions_source[qnumber] = $(this).val();
});