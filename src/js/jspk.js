$(document).ready(function(){

		$.ajax({
			type: "POST",
			url:'../pages/function/pkselect.php',
			dataType: "json"
		})
		.done(function(data){
			d = '<table id="table" cellspacing="0" cellpadding="0" border="0">';
			d += '<th class="pos">N</th>'+'<th class="nome">Nome</th>'+'<th class="pk">Pks</th>';
			$.each(data, function(index, value){
				index += 1;
				d += '<tr>' + '<td class="pos">' + index + '</td>' + '<td class="nome">' + value.char_name + '</td>' +
					  '<td class="pk">' + value.pkkills + '</td>' + '</tr>';
			});
			d += '</table>';

			$('#tabela').html(d);

				
				

		})
		.fail(function(){
			alert("ocorreu um erro");
		});
	});
