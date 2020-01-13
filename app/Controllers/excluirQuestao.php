<?php
require_once '../../vendor/autoload.php';
use App\Models\Questao;
$valor=$_POST["idQ"];
echo $valor;
Questao::delete(array(
    'id'=>$valor,
));
echo "ok";
?>