$(document).ready(function(){
	$.ajax({
		type: "POST",
		url:'../pages/function/CastleSiege.php',
		dataType: "html"
	})
	.done(function(data){
		$('#conteudo').html(data);
	})
	.fail(function(){
		alert("Não foi possivel carregar a siege.")
	});
});