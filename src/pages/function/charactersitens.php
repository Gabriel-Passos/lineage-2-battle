<?php
include 'conexao.php';
	@$nome = $_GET["val"];
	$test = "SELECT char_name, obj_Id FROM characters WHERE char_name = '".$nome."'";
	$query = mysqli_query($link, $test);
	$owner;
	if($query){
		while ($r = mysqli_fetch_array($query)) {
			$owner = $r["obj_Id"];


		}
		
		$dados = array();
		$enchant = array();
		$count = array();
		$sql = "SELECT item_id, count, enchant_level FROM items WHERE owner_id = '".$owner."'";
		$rs = mysqli_query($link,$sql);
		while ($rr = mysqli_fetch_array($rs)) {
			$dados[] = $rr["item_id"];
			$enchant[] = $rr["enchant_level"];
			$count[] = $rr["count"];
			echo $rr["item_id"];
			echo '<br/>';
		}

		$itemsBag = array();

		$y = 0;
		while ($y < count($dados)) {
		

		$armor = "SELECT name FROM armor WHERE item_id = '".$dados[$y]."'";
		
		if($r = mysqli_query($link,$armor)){
			while($q = mysqli_fetch_array($r)){
					$itemsBag[] = $q['name'];	
				}

		}
	
		$weapon = "SELECT name FROM weapon WHERE item_id = '".$dados[$y]."'";
		if($r1 = mysqli_query($link,$weapon)){
			while($p = mysqli_fetch_array($r1)){
				$itemsBag[] = $p['name'];
			}

		}

		$item = "SELECT name FROM etcitem WHERE item_id ='".$dados[$y]."'";
		if($r2 = mysqli_query($link,$item)){
			while($j = mysqli_fetch_array($r2)){
				$itemsBag[] = $j['name'];
			}
		}
		$y = $y + 1;

	}

	$k = 0;
	echo '<table id="table" cellspacing="40px" cellpadding="0" border="0" style="border: 1px solid black;">';
	echo '<th>Icones</th><th>Nomes</th><th>enchant</th><th>Quantidade</th>';
	while ($k < count($dados)) {
		
		echo '<tr><td><img src="../../img/icons_itens/1.png"/></td>
				<td>'.$itemsBag[5].'</td>
				<td>'.$enchant[$k].'</td>
				<td>'.$count[$k].'</td></tr>';
		

		$k++;
	}
	echo "</table>";
	}else{
		echo "n foi";
	}

?>