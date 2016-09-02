var restify = require("restify");
var request = require("request");

var server = restify.createServer();

server.use(restify.fullResponse())
server.use(restify.queryParser())
server.use(restify.bodyParser({ mapFiles: true }))
server.use(restify.authorizationParser())

server.use(
  function crossOrigin(req,res,next){
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "X-Requested-With");
    res.header("Access-Control-Allow-Methods","GET, POST, OPTIONS, PUT, PATCH, DELETE");
    res.header("Access-Control-Allow-Credentials", true);
    return next();
  }
);
var event_url = 'https://radiant-inferno-4091.firebaseio.com/Events.json'

server.get('/getEvents', function(req,res){
    request.get(event_url,function(error,response,body){
        if(error){
            console.log(error);
        }else{
            const json = JSON.parse(body)
            console.log(json)
            res.send(json)
        }
    })
})


var server = server.listen(process.env.PORT,  function () {
var host = process.env.IP;
var port = server.address().port;
console.log('Example app listening at http://%s:%s', host, port);
});