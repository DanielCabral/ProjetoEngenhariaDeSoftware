<?php
try{
    $HOST="localhost";
    $BANCO="ProvaSistema";
    $USUARIO="root";
    $SENHA=""; 
    $PDO=new PDO("mysql:host=".$HOST.";dbname=".$BANCO.";charset=utf8",$USUARIO,$SENHA);
}catch(PDOException $erro){
    echo "Erro de conexao";
}
?>