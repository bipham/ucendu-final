var isCreateReplyComment = false;
var isExpanded = [];
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
var question_id_noti = getUrlParameter('question');
var comment_id_noti = getUrlParameter('comment');

console.log('question_id_noti ' + baseUrl);
console.log('comment_id_noti ' + comment_id_noti);

var mainUrl_tmp = baseUrl.substring(7);
var adminBaseUrl = 'http://admin.' + mainUrl_tmp;

// $(document).on("keypress","input.reply-cmt",enterComment);

$(document).ready(function() {
    jQuery(function(){
        if (question_id_noti && comment_id_noti) {
            showComments(question_id_noti, true);
            $('#commentArea-' + question_id_noti).collapse();
        }
    });

    $('.btn-show-explanation').click(function () {

    });
});

function showExplanation(question_custom_id, question_order) {
    var ajaxShowExplanation = baseUrl + '/showExplanation/' + question_custom_id;
    $.ajax({
        type: "GET",
        url: ajaxShowExplanation,
        dataType: "json",
        success: function (data) {
            $('.title-explanation').html('EXPLANATION - Question ' + question_order);
            $('.explanation-detail').html(data.explanation);
            $('.solution-detail').addClass('transform-scale-width-custom-active');
            $('.explanation-column').removeClass('hidden');
            $('.explanation-column').addClass('transform-right-custom-active');

            //Scroll To highlight:
            var last_highlight = $('.highlighting');
            last_highlight.removeClass('highlighting');
            last_highlight.addClass('hidden-highlight');
            $('.highlight-' + question_order).removeClass('hidden-highlight');
            $('.highlight-' + question_order).addClass('highlighting');
            $("html, body").animate({
                scrollTop: $('.panel-container').offset().top
            }, 100);
            var idClass = 'highlight-' + question_order;
            var t = 60;
            var r = $(".left-panel-custom").offset().top;
            var u = $("."+idClass).offset().top;
            var f = $(".left-panel-custom").scrollTop();
            var v = u + f - r;
            $(".left-panel-custom").animate({
                scrollTop: v - t
            }, {
                duration: 100,
                complete: function () {
                }
            });
        },
        error: function (data) {
            bootbox.alert({
                message: "FAIL GET EXPLANATION!",
                backdrop: true
            });
        }
    });
}

function closeExplanation() {
    $('.explanation-column').addClass('hidden');
    $('.solution-detail').removeClass('transform-scale-width-custom-active');
    $('.explanation-column').removeClass('transform-right-custom-active');
}