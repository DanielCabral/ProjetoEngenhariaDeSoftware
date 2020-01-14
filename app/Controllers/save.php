<?php 
require_once '../../vendor/autoload.php';

use App\Models\Aluno;

$nome=$_POST['nome'];
$email=$_POST['email'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$tipo=$_POST['tipo'];
if($tipo==0){
    //carregando um aluno
    $a = new Aluno();
    Aluno::create(array(
        'nome'=>$nome,
        'email'=>$email,
        'login'=>$login,
        'senha'=>$senha
    ));
}
?>