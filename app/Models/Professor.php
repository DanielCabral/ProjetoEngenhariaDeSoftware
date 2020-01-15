<?php

namespace App\Models;
include '../../developer/DB/Sql.php';
use Developer\DB\Sql;

class Professor extends Usuario
{

    public function acess(int $id):int
    {
        $sql = new Sql();
        $dados = $sql->select('SELECT * FROM professor WHERE p_id = '.$id);

        if(isset($dados[0]))
        {
            $this->setid($dados[0]['p_id']);
            $this->setNome($dados[0]['p_nome']);
            $this->setEmail($dados[0]['p_email']);
            $this->setLogin($dados[0]['p_login']);
            $this->setSenha($dados[0]['p_senha']);
            $this->setTipo(1);                     

            return 1;
        }else{
            return 0;
        }   
    }

    public static function create(array $dados)
    {
        $sql = new Sql();
        $sql->query('INSERT INTO professor (p_nome, p_email, p_login, p_senha) VALUES ( :N, :E, :L, :S)', 
            array(
                ':N'=>$dados['nome'],
                ':E'=>$dados['email'],
                ':L'=>$dados['login'],
                ':S'=>$dados['senha']
            )
        );
    }

    public function save()
    {
        $sql = new Sql();
        $sql->query('UPDATE professor SET p_nome = :N, p_email = :E, p_login = :L, p_senha = :S WHERE p_id = :I', 
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
