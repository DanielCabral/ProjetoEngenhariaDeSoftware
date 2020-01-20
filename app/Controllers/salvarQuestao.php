<?php
require_once '../../vendor/autoload.php';
use App\Models\Questao;
if($_POST["metodo"]==0){
$_POST = json_decode(file_get_contents('php://input'), true);
$tipo=$_POST["tipoQ"];
$texto=$_POST["texto"];
//trim e strip
//carregando um aluno
$q = new Questao();
Questao::create(array(
    'tipo'=>$tipo,
    'texto'=>$texto,
));
}
else{
    $valor=$_POST["idQ"];
    echo $valor;
    Questao::delete(array(
        'id'=>$valor,
    ));
    echo "ok";
}
?>