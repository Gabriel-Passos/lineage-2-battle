$('#cadastrar').click(function(){

		$.ajax({
			url:'../pages/function/cadastrar.php',
			dataType: "json",
			data: $('#form').serialize(),
			type: "POST",
		}).done(function(data){
			if(data.result){
			alert(data.msg);
		}else{
			alert(data);
		}
		});
		return false;	
	});		
