$(document).ready(function(){
	$.ajax({
		type:"POST",
		url:'../pages/function/OnPlayers.php',
		dataType: "json"
	})
	.done(function(data){
		$('#ValuePlayers').text(data);
	})
	.fail(function(){
		alert("Não foi possivel se conectar ao servidor");
	});
});