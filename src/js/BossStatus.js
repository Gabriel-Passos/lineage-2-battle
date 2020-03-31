$(window).ready(function(){

	$.ajax({
		type: "POST",
		url:'../pages/function/boss.php',
		dataType: "html"
	})
	.done(function(data){
		$('#conteudo').html(data);
	})
	.fail(function(){
		alert("Erro ao Carregar Boss");
	});

});