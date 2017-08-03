function get_time(id, callback){
	var time = "";
	console.log(id);
	$.ajax({
		method : "POST",
		url : "http://192.168.0.14/vidbids/includes/fetch/auction_poll.php",
		data : {"auction_ids" : id},
		success : function(data){
			callback(JSON.parse(data));
		}
	})
}

$(document).ready(function(){
	//watch this MAY BE BLOCKING BE CAREFULL
	/*$.ajax({
		method : "POST",
		url : 
		success : function(data){
			var head = JSON.parse(data);
			$("#name").val(head.name);
			$("#coins").val(head.coins);
		}
	})*/

	var current_url = window.location.href;
	var current_page = current_url.split("/");
	current_page = current_page[current_page.length - 1];
	var check = current_page.split(".");
	var this_page = check[0];
	if(this_page == null || this_page == ''){
		this_page = 'home';
	}
	$('.button').hover(function(){
		var checker = $(this).attr("id");
		if(checker != this_page){
	    	$(this).siblings('div').animate({
	     		top: '5px',
	         	left: '4px'
	     	}, 100);
	 	}
	});
	$('.button').mouseleave(function(){
		var checker = $(this).attr("id");
		if(checker != this_page){
	    	$(this).siblings('div').animate({
	     		top: '0px',
	         	left: '0px'
	     	}, 75);
	 	}
	})
	$('body').on('mouseenter', '.auction-container', function(){
		$(this).children('.ani-container').children('.act-container').animate({
			top: '0px'
		}, 100)
	})
	$('body').on('mouseleave', '.auction-container', function(){
		$(this).children('.ani-container').children('.act-container').animate({
			top: '43px'
		}, 75)
	})
	$('#home').click(function(){
		window.location.href = "http://192.168.0.14/vidbids/";
	})
	$('#pc').click(function(){
		window.location.href = "http://192.168.0.14/vidbids/html/pc.php";
	})
	$('#xbox').click(function(){
		window.location.href = "http://192.168.0.14/vidbids/html/xbox.php";
	})
	$('#nintendo').click(function(){
		window.location.href = "http://192.168.0.14/vidbids/html/nintendo.php";
	})
	$('#ps4').click(function(){
		window.location.href = "http://192.168.0.14/vidbids/html/ps4.php";
	})
	$('#shop').click(function(){
		window.location.href = "http://192.168.0.14/vidbids/html/shop.php";
	})
	$('#history').click(function(){
		window.location.href = "http://192.168.0.14/vidbids/html/history.php"
	})
});