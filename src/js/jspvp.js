$(document).ready(function(){

		$.ajax({
			type: "POST",
			url:'../pages/function/pvpselect.php',
			dataType: "json"
		})
		.done(function(data){
			d = '<table id="table" cellspacing="0" cellpadding="0" border="0">';
			d += '<th class="pos">N</th>'+'<th class="nome">Nome</th>'+'<th class="pvp">PVPs</th>';
			$.each(data, function(index, value){
				index += 1;
				d += '<tr>' + '<td class="pos">' + index + '</td>' + '<td class="nome">' + value.char_name + '</td>' +
					  '<td class="pvp">' + value.pvpkills + '</td>' + '</tr>';
			});
			d += '</table>';

			$('#tabela').html(d);

				
				

		})
		.fail(function(){
			alert("ocorreu um erro");
		});
	});
