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

function showExplanation(qnumber,qorder) {
    $('.explanation-column').addClass('transform-right-custom-active') ;
    $('.solution-detail').addClass('transform-scale-width-custom-active') ;
}