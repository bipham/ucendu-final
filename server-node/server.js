/**
 * Created by BiPham on 11/2/2017.
 */
var app = require('express')();
var server = require('http').createServer(app);
var io = require('socket.io')(server);
var Redis = require('ioredis');
server.listen(8890);
console.log('Server running port: 8890 ...');
current_sockets = [];
io.origins((origin, callback) => {
    if (origin !== 'http://ucendu.dev') {
        console.log('origin not allowed: ' + origin);
        // io.close(); // Close current server
        return callback('origin not allowed', false);
    }
    callback(null , true);
});

var chat = io
    .of('/private-room-1')
    .on('connection', function (socket) {
        var redis = new Redis();
        socket.join('room 237', () => {
            let rooms = socket.rooms;

        });
        redis.psubscribe("private-room-1", function (error, count) {

        });
        redis.on('pmessage', function (partner, channel, data) {
            console.log('channel 1 ' + channel);
            console.log('message 1 : ' + data);
            console.log('partner 1 : ' + partner);
            data = JSON.parse(data);
            chat.emit(channel + ":" + data.event, data.data);
            console.log('---------- Sent private -----------');
            console.log('                                    ');
        });
        socket.on('disconnect', function() {
            redis.quit();
        });
    });
//
io.use((socket, next) => {
    if (socket.request.headers.cookie) {
        console.log('---------- Auth True -----------');
        return next();
    }
    next(new Error('Authentication error'));
});
io.on('connection', function (socket){
    console.log('session: ' + socket.request.session);
    console.log('Co nguoi vua ket noi ' + socket.id);
    console.log(socket.handshake.query);
    socket.on('updateSocket', function (data) {
        var new_socket = data + '###' + socket.id;
        current_sockets.push(new_socket);
        console.log('----------------- socket all: ' + current_sockets + '-------------------');
        console.log('                                    ');
    });

    socket.on('disconnect', function() {
        var key = null;
        for (i = 0; i < current_sockets.length; ++i) {
            var socket_id_tmp = current_sockets[i].substr(current_sockets[i].indexOf('###') +3);
            console.log('socket_id_tmp ' + i + ': ' + socket_id_tmp);
            if (socket_id_tmp === socket.id) {
                key = i;
                break;
            }
        }
        if (key != null) {
            current_sockets.splice(key,1);
            console.log('---------------- socket dis: ' + JSON.stringify(current_sockets) + '-------------------');
            console.log('                                    ');
        }
    });
});