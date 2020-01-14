<?php
require_once '../../vendor/autoload.php';
use App\Models\Alternativa;
$_POST = json_decode(file_get_contents('php://input'), true);
$valor=$_POST["vf"];
$texto=$_POST["texto"];
$fkId=$_POST["fk_idQ"];
//trim e strip
//carregando uma alternativa
$q = new Alternativa();
Alternativa::create(array(
    'texto'=>$texto,
    'valor'=>$valor,
    'fk_Questao_que_id'=>$fkId,

));

?>