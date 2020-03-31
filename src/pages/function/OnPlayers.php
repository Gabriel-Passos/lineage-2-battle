
<?php
include 'conexao.php';

$sql = "SELECT * FROM characters WHERE online=1";
$sql_consulta = mysqli_query($link,$sql);
$r = mysqli_num_rows($sql_consulta);

echo json_encode($r);

?>