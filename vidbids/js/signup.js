$(document).ready(function(){
	var sign_in_packet = {};

	var mySwiper = new Swiper('.swiper-container', {
	    speed: 400,
	    spaceBetween: 100,
	    allowSwipeToNext : false
	});


	$("#next").click(function(){
		mySwiper.slideNext("", 700);
	})

	function get_signup(){
		sign_in_packet.email = $("#email").val();
		sign_in_packet.confirm_email = $("#confirm_email").val();
		sign_in_packet.password = $("#password").val();
		sign_in_packet.confirm_password = $("#confirm_password").val();
		sign_in_packet.username = $("#username_container > input[type='text']").val();
	}

})