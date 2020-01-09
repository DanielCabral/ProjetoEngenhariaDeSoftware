<?php

require_once '../vendor/autoload.php';

use App\Models\Aluno;
use App\Models\Professor;

//==================================================//
//CRIANDO USUÁRIO
//==================================================//
    //AS CLASSES POSSUEM UM MÉTODO ESTÁTICO create(array())

    //criando um aluno
    Aluno::create(array(
        'nome'=>'aluno1',
        'email'=>'aluno1@email.com',
        'login'=>'loginAluno1',
        'senha'=>'senhaAluno1'
    ));

    //criando Professor
    Professor::create(array(
        'nome'=>'professor1',
        'email'=>'professor1@email.com',
        'login'=>'loginProfessor1',
        'senha'=>'senhaProfessor1'
    ));

//==================================================//
//ACESSANDO A CONTA DE UM USUÁRIO
//==================================================//

    //1: crie a classe e complete seus atributos para login:
        //login
        //senha
        //tipo
    
        //carregando um aluno
        $a = new Aluno();
        $a->setLogin('loginAluno1');
        $a->setSenha('senhaAluno1');
        $a->setTipo(0);                 //aluno por padrão é 0

        //carregando um professor
        $p = new Professor();
        $p->setLogin('loginProfessor1');
        $p->setSenha('senhaProfessor1');
        $p->setTipo(1);                 //professor por padrão é 1


    //2: use o método login() - herdada de usuário - para se ter o id 

        //carregando aluno
        $idAluno = $a->logar();

        //carregando professor
        $idProfessor = $p->logar();

    //3: teste para ver se retornou um ip e aí sim use o método acess($id)

        //carrgando aluno
        if($idAluno){
            $a->acess($idProfessor);
        }

        //carregando professor
        if($idProfessor){
            $p->acess($idProfessor);
        }
    //agora todos seus atributos foram carregados do banco de dados

//==================================================//
//ALTERANDO DADOS DO USUÁRIO
//==================================================//
    //para alterar o usuário deve-se estar logado em um usuário
    //alterando dados :
        
        //1: modifique os dados que deseja usando os 'sets' dos atributos

            //alterando aluno
            $a->setEmail('aluno1@novoemail.com');

            //alterando professor
            $p->setEmail('professor1@novoemail.com');

        //2: use o método save() para salvar os novos dados no banco de dados

            //alterando aluno
            $a->save();

            //alterando professor
            $p->save();