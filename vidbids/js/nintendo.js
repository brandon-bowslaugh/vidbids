$(document).ready(function(){

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

	function append_data(array){
		console.log(array);
		for(i=0; i < array.length; i++){
			$("#" + array[i].auction_id).children(".info-container").children(".time_left").html(array[i].left + " Sec Left");
		}
	}

	var time_assoc = [];
	$.ajax({
		method : "POST",
		url : "http://192.168.0.14/vidbids/includes/fetch/category/nintendo.php",
		success : function(data){
			console.log(data)
			
			var result = JSON.parse(data);
			var html = "<img src='../images/nintendo-title.svg'>";
			for(var i = 0; i < result.length; i++){
				html+="<div class='col-4 auction-container' id='" + result[i].auction_id + "'>";
					html+="<div class='img-container'><img src='../images/switch.jpg'></div>";
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
						html += "<p>" + result[i].name + "</p>"
					html += "</div>"
					html += "<div class='info-container'>"
						html += "<p id='current_price'>" + result[i].current_bid + "</p>";
						html += "<p class='cur-bid'>Current Bid</p>";
						html += "<p class='cost-bid'>" + result[i].bid_price + " bidcoins to bid</p>";
						html += "<p class='time_left'></p>";
					html += "</div>";
				html += "</div>";
				
				time_assoc[i] = result[i].auction_id;
			}
			get_time(time_assoc, append_data);
			setInterval(function(){
				get_time(time_assoc, append_data);
			}, 800);
			$('#contain').html(html);
		
		}
	})
});