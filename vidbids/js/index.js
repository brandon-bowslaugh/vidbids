$(document).ready(function(){
	var time_assoc = [];

	$("body").on("click", ".bid-button", function(){
		var this_id = $(this).parent().parent().parent().attr("id"); 
		$.ajax({
			method	: "POST",
			data : {"auction_id" : this_id},
			url : "http://192.168.0.14/vidbids/includes/post/bid.php",
			success : function(data){
				console.log(data);
			}
		})
	})

	$.ajax({
		method : "POST",
		url : "http://192.168.0.14/vidbids/includes/fetch/home.php",
		success : function(data){
			console.log(data)
			
			var result = JSON.parse(data);
			var popular = result.popular;
			var newer = result.newer;
			var html = "<img src='images/auctions-bar.svg'>";

			for(i=0; i < popular.length; i++){
				time_assoc[i] = popular[i].auction_id; 
			}

			for(i=0; i < newer.length; i++){
				if(!time_assoc.includes(newer[i].auction_id)){
					time_assoc[i + popular.length] = newer[i].auction_id;
				}
			}

			for(var i = 0; i < popular.length; i++){
				html+="<div class='col-4 auction-container "+ popular[i].auction_id +"' id='" + popular[i].auction_id + "'>";
					html+="<div class='img-container'><img src='images/switch.jpg'></div>";
					html += "<div class='ani-container'>";
						html += "<div class='act-container'>";
							html += "<button class='bid-button'>";
								html += "<p>Bid</p>";
							html += "</button>";
							html += "<button>";
								html += "<p>More Info</p>";
							html += "</button>";
						html += "</div>";
					html += "</div>";
					html += "<div class='title-container'>";
						html += "<p>" + popular[i].name + "</p>"
					html += "</div>"
					html += "<div class='info-container'>"
						html += "<p id='current_price'>" + popular[i].current_bid + "</p>";
						html += "<p class='cur-bid'>Current Bid</p>";
						html += "<p class='cost-bid'>" + popular[i].bid_price + " bidcoins to bid</p>";
						html += "<p class='time_left'></p>";
					html += "</div>";
				html += "</div>";
			}
			html += "<img class='other-head' src='images/new-title.svg'>";
			for(var i = 0; i < newer.length; i++){
				html+="<div class='col-4 auction-container "+ popular[i].auction_id +"' id='" + newer[i].auction_id + "'>";
					html+="<div class='img-container'><img src='images/switch.jpg'></div>";
					html += "<div class='ani-container'>";
						html += "<div class='act-container'>";
							html += "<button class='bid-button'>";
								html += "<p>Bid</p>";
							html += "</button>";
							html += "<button>";
								html += "<p>More Info</p>";
							html += "</button>";
						html += "</div>";
					html += "</div>";
					html += "<div class='title-container'>";
						html += "<p>" + newer[i].name + "</p>"
					html += "</div>"
					html += "<div class='info-container'>"
						html += "<p id='current_price'>" + newer[i].current_bid + "</p>";
						html += "<p class='cur-bid'>Current Bid</p>";
						html += "<p class='cost-bid'>" + newer[i].bid_price + " bidcoins to bid</p>";
						html += "<p class='time_left'></p>";
					html += "</div>";
				html += "</div>";
			}
			html += "<div style='clear: both'></div>";
			$('#contain').html(html);

			$.ajax({
				method : "POST",
				url : "http://192.168.0.14/vidbids/includes/fetch/auction_poll.php",
				data : {"auction_ids" : time_assoc},
				success : function(data){
					console.log(data);
					var time_data = JSON.parse(data);
					for(i=0; i < time_data.length; i++){
						$("." + time_data[i].auction_id).children(".info-container").children(".time_left").text(time_data[i].left + " Sec Left");
					}
				}
			})
			/*for(var i = 0; i < newer.length; i++){
				$("." + newer[i].auction_id).children(".info-container").children(".time_left").text(newer[i].left);
			}*/
		}
	})

	setInterval(function(){
		$.ajax({
			method : "POST",
			url : "http://192.168.0.14/vidbids/includes/fetch/auction_poll.php",
			data : {"auction_ids" : time_assoc},
			success : function(data){
				console.log(data);
				var time_data = JSON.parse(data);
				for(i=0; i < time_data.length; i++){
					$("." + time_data[i].auction_id).children(".info-container").children(".time_left").text(time_data[i].left + " Sec Left");
				}
			}
		})
	}, 800);
});