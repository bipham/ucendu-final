/**
 * Created by BiPham on 10/13/2017.
 */
function getAllTypeQuestionByLevelLessonId(less_id) {
    var ajaxGetAllTypeQuestionByLevelLessonId = baseUrl + '/getTypeQuestionByLevelLessonId';
    var lessID = less_id || '';
    var level_lesson_id = $('#list_level' + lessID).val().trim();
    $.ajax({
        type: "GET",
        url: ajaxGetAllTypeQuestionByLevelLessonId,
        dataType: "json",
        data: { level_lesson_id: level_lesson_id },
        success: function (data) {
            $('#list_type_questions' + lessID).empty();
            type_question_options = '';
            $.each(data.list_type_questions, function (index, type_question) {
                type_question_options += '<option value="' + type_question.id + '">' + type_question.name + '</option>';
            });
            $('#list_type_questions' + lessID).append(type_question_options);
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