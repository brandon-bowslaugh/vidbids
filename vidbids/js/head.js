$(document).ready(function(){
	$.ajax({
		method : "POST",
		url : 
		success : function(data){
			var head = JSON.parse(data);
			$("#name").val(head.name);
			$("#coins").val(head.coins);
		}
	})
})