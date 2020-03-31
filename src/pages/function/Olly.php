
<html>
<head>
<meta charset="utf-8">
<title>Heroes Do mes L2JBr</title>
<style type="text/css">
<!--
.style5 {font-size: 15px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style8 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.style4 {font-size: 17px; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
#scroll { overflow-x: scroll;}
	
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head>
<body>

<div  id="scroll">
<table width="100%" border="0" class="style4">
<tr>
<td align="center">Listando candidatos a heroes do servidor</td>
</tr>
</table>
<br>
<br>
<table width="100%" border="0">
<tr bgcolor="#CCCCCC" class="style5" align="center" height="30">
<td>Char:</td>
<td>Classe:</td>
<td>Vitórias:</td>
<td>Lutas:</td>
<td>Clan:</td>
<td>Ally:</td>

</tr>
<?php
include 'conexao.php';
$sql = mysqli_query($link,"SELECT * FROM olympiad_nobles ORDER BY char_name") or die(mysql_error());
$cor = 0;
while($c = mysqli_fetch_array($sql)) {
$cor = $cor + 1;
$bg = $cor % 2 == 0 ? '#F1F1F1' : '#E8E8E8';

$h = mysqli_query($link,"SELECT * FROM characters WHERE Obj_Id = '".$c['char_id']."'") or die(mysql_error());
$n = mysqli_fetch_array($h);
$l = mysqli_query($link,"SELECT * FROM class_list WHERE id = '".$n['base_class']."'") or die(mysql_error());
$g = mysqli_fetch_array($l);
$i = mysqli_query($link,"SELECT * FROM clan_data WHERE clan_id = '".$n['clanid']."'") or die(mysql_error());
$j = mysqli_fetch_array($i);
$k = mysqli_query($link,"SELECT * FROM olympiad_nobles ") or die(mysql_error());
$w = mysqli_fetch_array($k);
$g['class_name'] = explode("_", $g['class_name']);
$j['clan_name'] = empty($n['clanid']) ? 'Sem Clan.' : $j['clan_name'];
$j['ally_name'] = empty($j['ally_id']) ? 'Sem Alliance.' : $j['ally_name'];

?>

<tr bgcolor="<?php echo $bg; ?>" class="style8" align="center" height="23">
<td><?php echo $n['char_name']; ?></td>
<td><?php echo ucwords($g['class_name'][1]); ?></td>
<td><?php echo $w['olympiad_points']; ?></td>
<td><?php echo $w['competitions_done']; ?></td>
<td><?php echo $j['clan_name']; ?></td>
<td><?php echo $j['ally_name']; ?></td>


</tr>
<?php
}
?>
</table>
</div>