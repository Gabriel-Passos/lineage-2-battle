$(window).ready(function(){
	$.ajax({
		type: "POST",
		url:'../pages/function/Olly.php',
		dataType: "html"
	})
	.done(function(data){
		$('#conteudo').html(data);
	})
	.fail(function(){
		alert('Não foi possivel carregar as informações');
	});
});