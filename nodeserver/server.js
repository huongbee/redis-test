//const app = require('express')()

const port = process.env.PORT || 3000;

//const server = require('http').Server(app);
const io = require('socket.io')(port);

// server.listen(port, () => {
//     console.log(`Server start on port ${port}`)
// });

io.on('error',function (error) {
    console.log(error)
})

io.on('connection',function (socket) {
    console.log('Client:  '+socket.id)
})

const Redis = require('ioredis');
const redis = new Redis(6379);

redis.psubscribe('*',(error, count)=>{
    console.log(error);
    console.log(count)
});

redis.on('pmessage', (pattern, channel, message)=>{
    console.log(channel);
    console.log(message)
    message  = JSON.parse(message)
    //io.emit(channel + ':'+message.event,message);
    console.log('sent...');
});









// var app = require('express')();
// var server = require('http').Server(app);
// var io = require('socket.io')(server);
// var redis = require('ioredis');

// io.on('connection', function (socket) {

//     console.log("new client connected");
//     var redisClient = redis.createClient();
//     redisClient.subscribe('message');

//     redisClient.on("message", function(channel, message) {
//         console.log("new message in queue "+ message + "channel");
//         socket.emit(channel, message);
//     });

//     socket.on('disconnect', function() {
//         redisClient.quit();
//     });

// });


// const port = process.env.PORT || 3000;
// app.listen(port, () => {
//     console.log(`Server start on port ${port}`)
// })