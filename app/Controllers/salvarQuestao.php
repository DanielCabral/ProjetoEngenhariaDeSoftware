<?php
require_once '../../vendor/autoload.php';
use App\Models\Questao;
$_POST = json_decode(file_get_contents('php://input'), true);
//$data = json_decode(file_get_contents('php://input'), true);
//print_r($data);
$tipo=$_POST["tipoQ"];
$texto=$_POST["texto"];
//trim e strip
//carregando um aluno
$q = new Questao();
$id=$q->generateId();
$id+=1;
Questao::create(array(
    'id'=>$id,
    'tipo'=>$tipo,
    'texto'=>$texto,
));
echo $id;

?>