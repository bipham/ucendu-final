/**
 * Created by BiPham on 7/9/2017.
 */
var content_post = '';
var content_highlight = '';
var content_quiz = '';
var content_answer_quiz = '';
var limit_time = 0;
var level_user_id = 0;
var order_lesson = 0;
var type_question = '';
var all_ordered_elements = '';
var type_lesson = 1;
var title_post = '';
var img_url = '';
var img_name = '';
var img_name_no_ext = '';
var img_extension = '';
var listQ = [];
var listAnswer = {};
var listKeyword = {};
var listClassKeyword = {};
var listAnswer_source = {};
var listKeyword_source = {};
var type_question_id = '';
var i = '';
var idremove = '';
var listHl = [];
var noti = false;
var sandbox = document.getElementById('sandbox');
var boolRemove = false;

var ajaxUploadFinish = baseUrl + '/createNewReadingPractice';

var hltr = new TextHighlighter(sandbox, {
    onBeforeHighlight: function (range) {
        i = prompt("Higlight for answer number:", "");
        console.log('i: ' + i);
        if (i) {
            hltr.options['highlightedClass'] ='answer-highlight highlight-' + i;
            if (jQuery.inArray(i, listHl) == -1) {
                listHl.push(i);
            }
            return true;
        }
        else return false;
    },
    onAfterHighlight: function (range, hlts) {
        var qnumber = $('.answer-' + i).data('qnumber');
        $('.highlight-' + i).attr('data-qnumber', qnumber);
        var idClass = 'hl-answer-' + qnumber;
        $('.highlight-' + i).attr('id', idClass);
        console.log('div: ' + $('.remove-ans-' + i).length);
        if ($('.remove-ans-' + i).length == 0) {
            $('.remove-highlight-area-' + i).append('<div class="remove-ans-' + i + '">Remove highlight for anwser ' + i + ': <button class="btn btn-info remove" data-removeid="' + i + '">Remove</button></div>');
        }
    },
    onRemoveHighlight: function (hl) {
        var clcus = 'answer-highlight highlight-' + idremove;
        if (hl.className == clcus) {
            if (!noti) {
                boolRemove = window.confirm('Do you really want to remove: "' + hl.className + '"');
                noti = true;
            }
            console.log('bnool: ' + boolRemove);
            if (boolRemove) {
                $('.remove-ans-' + idremove).remove();
                return true;
            }
        }
        else return false;
    }
});

$( document ).ready(function() {
    content_post = CKEDITOR.instances["contentPost"].getData();
    content_quiz = CKEDITOR.instances["contentQuiz"].getData();
    $('.btn-next-step-quiz').click(function () {
        title_post = $('input#itemname').val();
        type_question_id = $('#list_type_questions').val().trim();
        var ajaxGetAllOrdered = baseUrl + '/getAllOrdered/1-' + type_question_id;
        var current_order_lesson = 1;
        $.ajax({
            type: "GET",
            url: ajaxGetAllOrdered,
            dataType: "json",
            // data: {},
            success: function (data) {
                $('#loading').hide();
                $('.list-ordered').html('');
                jQuery.each( data.all_orders, function( key_order, order ) {
                    $('.list-ordered').append('<li>' + order.order_lesson + '</li>');
                    current_order_lesson = order.order_lesson + 1;
                });
                $('#order_lesson').val(current_order_lesson);
            },
            error: function (data) {
                $('#loading').hide();
                bootbox.alert({
                    message: "Get ordered fail!",
                    backdrop: true
                });
            }
        });
        var checkDataStepPost = checkStepPost();
        if (checkDataStepPost) {
            $('.step-content-post').addClass('hidden-class');
            $('.step-content-quiz').removeClass('hidden-class');
        }
    });

    $('.btn-prev-step-post').click(function () {
        $('.step-content-quiz').addClass('hidden-class');
        $('.step-content-post').removeClass('hidden-class');
    });

    $('.btn-next-step-answer').click(function () {
        level_user_id = $('#list_level_users').val().trim();
        order_lesson = $('#order_lesson').val().trim();
        var checkDataStepQuiz = checkStepQuiz(level_user_id, order_lesson);
        if (checkDataStepQuiz) {
            if ((content_quiz != CKEDITOR.instances["contentQuiz"].getData()) || (type_lesson != $('#typeLesson').val()) ) {
                content_quiz = CKEDITOR.instances["contentQuiz"].getData();
                $('.preview-content-quiz .card-block').html(content_quiz);
                $('.answer-area').html('');
                listQ = [];
                $('.question-quiz').each(function () {
                    var qnumber = $(this).data('qnumber');
                    if (jQuery.inArray(qnumber, listQ) == -1) {
                        listQ.push(qnumber);
                        var qorder = $(this).attr('name');
                        qorder = qorder.match(/\d+/);
                        $('.answer-area').append(   '<div class="answer-key answer-enter-' + qnumber + '" data-qnumber="' + qnumber + '">' +
                            '<h5 class="title-answer-for-question title-custom">Question ' + qorder + ':</h5>' +
                            '<div class="enter-answer-key row-enter-custom">' +
                            '<div class="title-row-enter">Answer ' + qorder + ': </div>' +
                            '<input class="answer-q answer-' + qorder + '" data-qnumber="' + qnumber + '" />' +
                            '</div>' +
                            '<div class="enter-keyword row-enter-custom">' +
                            '<div class="title-row-enter">Explanation ' + qorder + ': </div>' +
                            '<textarea class="input-keyword keyword-' + qorder + '" data-qnumber="' + qnumber + '"></textarea>' +
                            '</div>' +
                            '<div class="card-block remove-highlight-area-' + qorder + '">' +
                            '</div>' +
                            '</div>');
                    }
                    if (jQuery.inArray(qnumber, listAnswer_source) == -1) {
                        $('input.answer-q[data-qnumber=' + qnumber + ']').val(listAnswer_source[qnumber]);
                        $('textarea.input-keyword[data-qnumber=' + qnumber + ']').val(listKeyword_source[qnumber]);
                    }
                });
            }
            if (listQ.length > 0) {
                $('.step-content-quiz').addClass('hidden-class');
                $('.step-answer-key').removeClass('hidden-class');
            }
            else {
                bootbox.alert({
                    message: "Please enter question of quiz!",
                    backdrop: true
                });
            }
            if (content_post != CKEDITOR.instances["contentPost"].getData()) {
                content_post = CKEDITOR.instances["contentPost"].getData();
                $('.remove-highlight-area').html('');
                $('#sandbox').html(content_post);
            }
        }
    });

    $('.btn-prev-step-quiz').click(function () {
        $('.step-content-quiz').removeClass('hidden-class');
        $('.step-answer-key').addClass('hidden-class');
    });

    $('.btn-prev-step-answer').click(function () {
        $('.step-answer-key').removeClass('hidden-class');
        $('.step-preview-post').addClass('hidden-class');
        $('.answer-highlight').removeClass('hidden-highlight');
        $('.answer-highlight').removeClass('highlighting');
        $('#pr-post').html('');
        $('#pr-quiz').html('');
    });

    $('.btn-next-step-preview').click(function () {
        var checkDataStepAnswer = checkStepAnswer();
        if (checkDataStepAnswer) {
            content_highlight = $('#sandbox').html();
            $('.step-preview-post').removeClass('hidden-class');
            $('.step-answer-key').addClass('hidden-class');
            $('#pr-post').html(content_highlight);
            $('.answer-highlight').addClass('hidden-highlight');
            $('#pr-quiz').html(content_quiz);
            $('#pr-quiz .last-option').each(function () {
                var qnumber = $(this).data('qnumber');
                var qorder = $(this).attr('name');
                qorder = qorder.match(/\d+/);
                var answer_key = $('.answer-' + qorder).val();
                $(this).parent().after( '<div class="explain-area explain-' + qorder + ' explain-area-' + qnumber + '" data-qnumber="' + qnumber + '" data-qorder="' + qorder + '" data-type-question="' + list_type_questions[qnumber] + '">' +
                    '<div class="show-answer">' +
                    '<button type="button" class="btn btn-danger btn-show-answer">Answer ' + qorder + ' ' +
                    '<div class="badge badge-pill key-answer">' +
                    answer_key +
                    '</div>' +
                    '</button>' +
                    '<div class="explain-show' + '" id="explain-' + qnumber +'"> ' +
                    '<button type="button" class="btn btn-primary btn-show-explanation show-explanation-' + qnumber + '" data-qnumber="' + qnumber + '" data-qorder="' + qorder + '" data-type-question="' + list_type_questions[qnumber] + '">' +
                    '<i class="fa fa-key" aria-hidden="true"></i>' +
                    ' Explanation' +
                    '</button>' +
                    '<div class="hidden explanation">' +
                    listKeyword[qnumber] +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    // '<div class="solution-tools locate-highlight-tool">' +
                    //     '<a class="btn btn-xs btn-outline-warning btn-locate-highlight" data-qnumber="' + qnumber +'" onclick="scrollToHighlight(' + qorder + ')">' +
                    //         '<i class="fa fa-map-marker" aria-hidden="true"></i>' +
                    //         '&nbsp;Locate' +
                    //     '</a>' +
                    // '</div>' +
                    // '<div class="solution-tools locate-comment-tool">' +
                    //     '<a class="btn btn-xs btn-outline-primary btn-show-comments" data-qnumber="' + qnumber +'" data-toggle="collapse" href="#commentArea-' + qnumber + '" aria-expanded="false" aria-controls="commentArea-' + qnumber + '" onclick="showComments(' + qnumber + ')">' +
                    //         '<i class="fa fa-question" aria-hidden="true"></i>' +
                    //         '&nbsp;Comments' +
                    //     '</a>' +
                    // '</div>' +
                    // '<div class="collapse collage-comments collapse-custom" id="commentArea-' + qnumber +'"> ' +
                    //     '<div class="card card-header comments-area-title">QUESTION & ANSWER:' +
                    //     '</div>' +
                    //     '<div class="card card-block comments-area">' +
                    //     '</div>' +
                    // '</div>' +
                    '</div>');
            });
            $('#pr-quiz input').each(function () {
                $(this).attr('disabled', 'disabled');
            });
            $('#pr-quiz select').each(function () {
                $(this).attr('disabled', 'disabled');
            });
            content_answer_quiz =  $('#pr-quiz').html();
            content_highlight = $('#pr-post').html();
        }
        else {
            bootbox.alert({
                message: "Please enter answer of quiz!",
                backdrop: true
            });
        }
    });

    $('.btn-finish-steps').click(function () {
        $('#loading').show();
        $.ajax({
            type: "POST",
            url: ajaxUploadFinish,
            dataType: "json",
            data: { level_user_id: level_user_id, order_lesson: order_lesson, type_question_id: type_question_id, img_url: img_url, img_name_no_ext: img_name_no_ext, img_extension: img_extension, title_post: title_post, list_answer: listAnswer, content_post: content_post, content_highlight: content_highlight, content_quiz: content_quiz, content_answer_quiz: content_answer_quiz, list_type_questions: list_type_questions, listKeyword: listKeyword },
            success: function (data) {
                $('#loading').hide();
                if (data.result == 'fail-order') {
                    bootbox.alert({
                        message: 'Order lesson is not available!',
                        backdrop: true
                    });
                }
                else {
                    bootbox.alert({
                        message: 'Create new practice lesson success!',
                        backdrop: true,
                        callback: function(){
                            location.href= baseUrl + '/createNewReadingPractice';
                        }
                    });
                }
            },
            error: function (data) {
                $('#loading').hide();
                bootbox.alert({
                    message: "Create practice lesson fail!",
                    backdrop: true
                });
            }
        });
    });
});

$(document).on("click", ".remove",function() {
    idremove = $(this).data('removeid');
    noti = false;
    hltr.removeHighlights();
});