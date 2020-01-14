<?php

namespace App\Models;
include '../../developer/DB/Sql.php';
use Developer\DB\Sql;

class Aluno extends Usuario
{


    public function acess(int $id):int
    {
        $sql = new Sql();
        $dados = $sql->select('SELECT * FROM aluno WHERE a_id = '.$id);

        if(isset($dados[0]))
        {
            $this->setid($dados[0]['a_id']);
            $this->setNome($dados[0]['a_nome']);
            $this->setEmail($dados[0]['a_email']);
            $this->setLogin($dados[0]['a_login']);
            $this->setSenha($dados[0]['a_senha']);
            $this->setTipo(0);                     

            return 1;
        }else{
            return 0;
        }   
    }

    public static function create(array $dados):bool
    {
        $sql = new Sql();
        $ok=$sql->query('INSERT INTO aluno (a_nome, a_email, a_login, a_senha) VALUES (:N, :E, :L, :S)', 
            array(
                ':N'=>$dados['nome'],
                ':E'=>$dados['email'],
                ':L'=>$dados['login'],
                ':S'=>$dados['senha']
            )
        );
        echo $ok;
        return $ok;
    }

    public function save()
    {
        $sql = new Sql();
        $sql->query('UPDATE aluno SET a_nome = :N, a_email = :E, a_login = :L, a_senha = :S WHERE a_id = :I', 
            array(
                ':N'=>$this->getNome(),
                ':E'=>$this->getEmail(),
                ':L'=>$this->getLogin(),
                ':S'=>$this->getSenha(),
                ':I'=>$this->getId()
            )
        );
    }
}

