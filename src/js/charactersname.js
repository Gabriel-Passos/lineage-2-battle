$('#btnradio').click(function(){
	var var_name = document.querySelector('input[name="radiob"]:checked').value;
	
	
	location.href="../../pages/function/charactersitens.php?val="+var_name;
});