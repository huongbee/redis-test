const io = require('socket.io')(6001)
console.log('Connecting....');
io.on('error',function (error) {
    console.log(error)
})
io.on('connection',function (socket) {
    console.log('Client:  '+socket.id)
})

const Redis = require('ioredis');
const redis = new Redis(6379);

redis.psubscribe('*',function(error, count){
    // console.log(error);
    // console.log(count)
});
redis.on('pmessage', function(pattern, channel, message){
    console.log(channel);
    console.log(message)
});
