$(document).ready(function(){
	$("#confirm").click(function(){
		$.ajax({
			method :"POST",
			url : "192.168.0.14/vidbids/includes/login/login.php",
			data : {"username" : $("#username").val(), "password" : $("#password").val()},
			success : function(data){
				console.log(data);
			}
		})
	})

	//validation here.
})