<?php 
include "conexao.php";
$login=$_POST['email'];
$senha=$_POST['senha'];
//$consulta = $PDO->query("SELECT * FROM admin where login=".$login." and senha=".$senha.";");
$stmt = $PDO->prepare("SELECT * FROM admin where login=? and senha=?");
$stmt->execute([$login,$senha]); 
if ($stmt->rowCount() == 1) {
   echo "ok";
}
?>