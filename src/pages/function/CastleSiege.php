<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR...nsitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#siege{width:100%; height:300px;overflow: scroll;
    white-space: nowrap;}
.table {text-align:center; color:#000;}
.rowt{font-size:17px; font-weight:normal;color:#000; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif}
.row {font-size:15px;font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
a:hover {background:#ffffff; text-decoration:none;} /* background-color e necessario para o IE6 */
a.tooltip span {display:none; padding:10px 12px; margin-left:8px; width:auto;}
a.tooltip:hover span{display:inline; position:absolute; background:#000; border:1px solid #666; color:#FFF; text-align:justify; font-size:12px; font-weight:bold;}
 
*{
margin:0;
padding:0;
}
 
.text-cont {

text-align:center;
font-family:Tahoma, Geneva, sans-serif;
font-size:12px;
color:#000;
margin-top:10px;
margin-bottom:5px;
}
 
#barra_cont {
background:#0054a6;
width:600px;
height:35px;
margin-top:10px;
}
 
.titulo_cont {
text-align:center;
font-family:Tahoma, Geneva, sans-serif;
font-size:14px;
color:#FFF;
padding:10px;
}
 
.text-cont a {
        color: #09F;
        text-decoration:none;
}
.text-cont a:hover {
        color:#06F;
}
 
</style>
</head>
<body>
<div class="text-cont">
<center>
<h3>Sieges</h3>
<br/>
<hr/>
<div id="siege">
<table width="500px" border="0" align="center">
  <tr class="rowt" align="center" height="25">
        <td>Castelo:</td>
        <td>Clan:</td>
        <td>Lord Castle:</td>
        <td>Alliança:</td>
        <td>Próxima Siege:</td>
</tr>
<?php

include 'conexao.php';
$sql = mysqli_query($link,"SELECT * FROM castle ORDER BY name");
$cor = 0;
while($c = mysqli_fetch_array($sql)) {
          $cor = $cor + 1;
          $bg  = $cor % 2 == 0 ? '#F1F1F1' : '#FFFFFF';
 
          $cl = mysqli_query($link,"SELECT * FROM clan_data WHERE hasCastle = '".$c['id']."'") or die(mysql_error());
          $clan = mysqli_fetch_array($cl);
         
          $l = mysqli_query($link,"SELECT * FROM characters WHERE 'obj_id' = '".$clan['leader_id']."'") or die(mysql_error());
          $lord = mysqli_fetch_array($l);
 
?>
 
  <tr bgcolor="<?php echo $bg; ?>" class="style8" align="center" height="23">
        <td><a style="color:#000;text-decoration:none;" href="#" class="tooltip" ><?php echo $c['name']; ?><span>Castle Name: <font color="#FF9900"><?php echo $c['name'];?></font><br />Tax Percent: <font color="#FF9900"><?php echo $c['taxPercent']."%"; ?></font></span> </a></td>
        <td><?php echo !empty($clan['clan_name']) ? $clan['clan_name'] : "No Clan"; ?></td>
        <td><?php echo !empty($lord['char_name']) ? $lord['char_name'] : "No Lord"; ?></td>
        <td><?php echo !empty($clan['ally_name']) ? $clan['ally_name'] : "No Ally"; ?></td>
        <td><?php echo @date('D\, j M Y H\:i',$c['siegeDate']/1000); ?></td>
  </tr>
<?php
}
?>
</table>
</div>
</center>

</body>
</html> 