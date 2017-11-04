/**
 * Created by nobikun1412 on 27-May-17.
 */
// Notification.requestPermission();
var baseUrl = document.location.origin;
var user_id = $('.test-pusher').data('user-id');
var private_connect = baseUrl + ':8890/private-room-' + user_id;
var public_connect = baseUrl + ':8890?user_id=user_id';
var socket_private = io.connect(private_connect);
var socket_public = io.connect(public_connect);
socket_public.emit('updateSocket', user_id);
socket_public.on('commnent-noti:App\\Events\\CommentNotificationEvent', function (data) {
   console.log('Data: ' + data);
});
socket_private.on('private-room-' + user_id + ':App\\Events\\TestCommentEvent', function (data) {
    console.log('Data room: ' + data);
    addMessageDemo(data)
});
//function add message
function addMessageDemo(data) {
    var liTag = $("<li class='list-group-item'></li>");
    console.log(data);
    liTag.html(data.message);
    $('#messages').append(liTag);
    notifyMe(data.message);
}

function notifyMe(message) {
    if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
    }
    else if (Notification.permission === "granted") {
        var options = {
            body: message,
            icon: "/public/imgs/original/logo.jpg",
            dir : "ltr"
        };
        var notification = new Notification("Ucendu",options);
    }
    else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
            if (!('permission' in Notification)) {
                Notification.permission = permission;
            }

            if (permission === "granted") {
                var options = {
                    body: message,
                    icon: "/public/imgs/original/logo.jpg",
                    dir : "ltr"
                };
                var notification = new Notification("Ucendu",options);
            }
        });
    }
}