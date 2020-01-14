<?php

namespace App\Models;

use Developer\DB\Sql;
//use App\Models\Usuario;

class Usuario
{
    private $login;
    private $senha;
    private $tipo;  //é uma variável exclusiva em código (não possui no BD)
    private $id;
    private $nome;
    private $email;

    public function getId():int{ return $this->id; }
    public function setId(int $id){ $this->id = $id; }

    public function getNome():string{ return $this->nome; }
    public function setNome(string $nome){ $this->nome = $nome; }

    public function getEmail():string{ return $this->email; }
    public function setEmail(string $email){$this->email = $email; }
    
    public function getLogin():string{ return $this->login; }
    public function setLogin(string $login){ $this->login = $login; }

    public function getSenha():string{ return $this->senha; }
    public function setSenha(string $senha){ $this->senha = $senha; }

    public function getTipo():int{ return $this->tipo; }
    public function setTipo(int $tipo){ $this->tipo = $tipo; }

    
    public function logar():int
    {
        $result;

        if($this->getTipo())
        {
            $sql = new Sql();
            $result = $sql->select('SELECT p_id FROM professor WHERE p_login = :L AND p_senha = :S', 
                array(
                    ':L'=>$this->getLogin(),
                    ':S'=>$this->getSenha()
                )
            );
        }
        else
        {
            $sql = new Sql();
            $result = $sql->select('SELECT a_id FROM aluno WHERE a_login = :L AND a_senha = :S',
                array(
                    ':L'=>$this->getLogin(),
                    ':S'=>$this->getSenha()
                )
            );
        }
        var_dump($result);
        if(isset($result[0]) && $this->getTipo()){
            return $result[0]['p_id'];
        }elseif(isset($result[0])){
            return $result[0]['a_id'];
        }else{
            return -1;
        }
    }
}
