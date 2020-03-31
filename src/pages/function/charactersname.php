<style type="text/css">
	body{
		background-color: white;

	}
	.radio{
		color:white;
	}
	#table{

	}

</style>
<?php

	include 'conexao.php';

	$NomesPLayers = "SELECT char_name FROM characters where accesslevel<1";
	$queryNomes = mysqli_query($link, $NomesPLayers);
	echo '<div id="table">';
	

	while ($r = mysqli_fetch_array($queryNomes)) {
		$r["char_name"] = utf8_encode($r["char_name"]);
		
		echo '<input type="radio" class="radio" name="radiob" value='.$r["char_name"].'> <h2>'.$r["char_name"]. '</h2><br>';
	}
	echo "</div>";
	echo '<button id="btnradio">Ver itens</button>';
?>
<html>
<body>
<head>
	<script src="http://code.jquery.com/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../../js/charactersname.js"></script>
</head>
</body>
</html>