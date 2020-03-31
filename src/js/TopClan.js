$(window).ready(function(){
	$.ajax({
		type: "POST",
		url:'../pages/function/TopClan.php',
		dataType: "json"
	})
	.done(function(data){
		d = "<h2 style='text-align: center;'>Top Clan</h2><br/>";
		d += '<table id="table" cellspacing="0" cellpadding="0" border="0">';
		d += '<th>Nome</th>' + '<th>Level</th>' + '<th>Reputação</th>';
		$.each(data, function(index, value){
			index += 1;
			d += '<tr>' + '<td>' + value.clan_name + '</td>' +
					  '<td >' + value.clan_level + '</td>' + 
					  '<td >' + value.reputation_score + '</td>' + '</tr>';
		});
		d += '</table>';
		$('#conteudo').html(d);
	})
	.fail(function(){
		alert("Não foi possivel carregar o top clan");
	});
});