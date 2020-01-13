<?php 
require_once '../../vendor/autoload.php';

use App\Models\Aluno;
use App\Models\Professor;

$login=$_POST['email'];
$senha=$_POST['senha'];
$tipo=$_POST['tipo'];
echo $tipo;
if($tipo==0){
    //carregando um aluno
    $a = new Aluno();
    $a->setLogin($login);
    $a->setSenha($senha);
    $a->setTipo(0);                 //aluno por padrão é 0
    $idAluno = $a->logar();
    //carregando aluno
    if($idAluno){
        $a->acess($idAluno);
        header('Location: ../Views/home/');
        echo 'logou';
    }else{
        echo 'nao logou';
    }
}else{
    //carregando um professor
    $p = new Professor();
    $p->setLogin($login);
    $p->setSenha($senha);
    $p->setTipo(1);                 //professor por padrão é 1

    //carregando professor
    $idProfessor = $p->logar();
     //carregando professor
    if($idProfessor!=-1){
        $p->acess($idProfessor);
        header('Location: /home/index.php');
      echo 'logou';
    }else{
        echo 'nao logou';
    }
}
?>