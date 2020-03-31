<?php
	include 'conexao.php';

	$sql = "SELECT char_name, pkkills FROM characters order by pkkills DESC LIMIT 15 ";
	$rs = mysqli_query($link, $sql);
	$dados = array();

	while( $r = mysqli_fetch_object($rs)){
		$r->char_name = utf8_encode($r->char_name);
		$dados[] = $r;
	}
	mysqli_close($link); 
	echo json_encode($dados);

?>