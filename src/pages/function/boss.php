<style type="text/css" media="screen">
.style2 {
	font-weight:bold;
	height:28px;
}
.style3 { background-color:#111; height:28px; }
.style10 { font-size:10px; }
.vivo { color:#0c0; }
.morto { color:#f00; }
#table_boss {
	border:none;
	width:100%;
}
#table_boss tr td {
	text-align:center;
	border:0px solid #333;
}

#table_boss tr.topo {
	font-weight:bold;
	font-size:10px;
}
#table_boss tr.topo td {
	height:28px;
	background:#222;
}
#table_boss tr.topo td.t1 { width:40%; height:28px; }
#table_boss tr.topo td.t2 { width:15%; height:28px; }
#table_boss tr.topo td.t3 { width:30%; height:28px; }
</style>
      <!-- BOX -->
		<div id="box_topo">
        Grand Bosses status</div>
        <div id="box_baixo">
        <div id="box_centro">
        <br>
        <b>All Bosses will only be online after 1 week in online server.</b> <br><br>
        <br>
        
        <?php
        include 'conexao.php';
$sql1 = "SELECT boss_id,respawn_time FROM grandboss_data ORDER BY respawn_time DESC";
$raidspawn = mysqli_query($link,$sql1);
$total = mysqli_num_rows($raidspawn);
$max_pag = 25;

$paginas =  (($total % $max_pag) > 0) ? (int)($total / $max_pag) + 1 : ($total / $max_pag);

if (isset($_GET['pagina'])){
   $pagina = (int)$_GET['pagina'];
}else{
   $pagina = 1;
}

$pagina = max(min($paginas, $pagina), 1);
$inicio = ($pagina - 1) * $max_pag;

$sql2 = "SELECT boss_id,respawn_time FROM `grandboss_data` ORDER BY `respawn_time` DESC ";
$query = mysqli_query($link,$sql2);
echo '<table width="100%" id="table_boss" cellpadding="1" cellspacing="1">';
echo '<tr>
		  <td><strong>Boss Name</strong></td>
		  <td>Status</td>
		  <td><strong>Respawn</strong></td>
		  <td>Level</td>
		</tr>';

while(list($boss_id,$respawn_time) = mysqli_fetch_row($query)){
	$sql3 ="SELECT name,level FROM npc WHERE id = $boss_id";
	$raidnames = mysqli_query($link,$sql3);
    $text = '<span class="vivo">Live</span>';
	$respawn = 'Spawned';
    if($respawn_time > 0){
		$respawntime = date('d/m/Y \\ | H:i:s A',($respawn_time / 1000));
		$text = '<span class="morto">Dead</span>';
		$respawn = '<span class="respawntime">'.$respawntime.'</span>';
	}
	while(list($raidname,$levelup) = mysqli_fetch_row($raidnames)){
		echo '<tr bgcolor="#2a221d">
				<td height="28" align="center"><strong>'.$raidname.'</strong></td>
				<td height="28" align="center">'.$text.'</td>
				<td height="28" align="center"><strong>'.$respawn.'</strong></td>
				<td height="28" align="center">'.$levelup.'</td>
			  </tr>';
	}
}
echo '</table>';
?>

       </div>
        </div>
        <!-- BOX -->