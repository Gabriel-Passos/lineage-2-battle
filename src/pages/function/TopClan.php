<?php

	include 'conexao.php';

	$sql = "SELECT clan_name, clan_level, reputation_score FROM clan_data ORDER BY  clan_level, reputation_score DESC";
	$rs = mysqli_query($link,$sql);
	$dados = array();

	while ($r = mysqli_fetch_object($rs)) {
		$r->clan_name = utf8_encode($r->clan_name);
		$dados[] = $r;
	}
	mysqli_close($link);
	echo json_encode($dados);
?>