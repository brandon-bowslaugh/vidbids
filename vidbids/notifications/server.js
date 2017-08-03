var app = require('http').createServer(handler),
	io = require('socket.io')(app),
	fs = require('fs'),
	redis = require("redis"),
	client = redis.createClient();

	open_socks = [];

app.listen(4999);

function handler (req, res) {
  fs.readFile(__dirname + '/index.html',
  function (err, data) {
    if (err) {
      res.writeHead(500);
      return res.end('Error loading index.html');
    }

    res.writeHead(200);
    res.end(data);
  });
}

io.on('connection', function (socket){
	var this_sock = socket.id;
	socket.on('bid', function(data){
		client.get(data.id, function(err, reply){
			if(reply == null){
				client.set(data.id, this_sock);
			}

			else if(reply != null && reply != this_sock){
				client.set(data.id, this_sock);
			}
			
			if(data.previous != undefined){
				client.get(data.previous, function(err, reply){
					if(reply != null){
						socket.to(reply).emit("outbid");
					}
				})
			}
		})

		/*if (open_socks.indexOf(data.id) == -1){
			open_socks.push(data.id);
			open_socks.push(this_sock);
		}
		else if(open_socks.indexOf(data.id) != -1 && open_socks[open_socks.indexOf(data.id) + 1] != this_sock){
			open_socks[open_socks.indexOf(data.id) + 1] = this_sock;
		}

		if (open_socks.indexOf(data.last_bid) != -1){
			socket.to(open_sock[indexOf(data.last_bid) + 1]).emit("outbid");
		}
		
		console.log(open_socks);

		socket.on('disconnect', function(){
			open_socks = open_socks.splice(open_socks.indexOf(data.id), 0);
			console.log("heyyy");
			console.log(open_socks);
		})*/
	})
});