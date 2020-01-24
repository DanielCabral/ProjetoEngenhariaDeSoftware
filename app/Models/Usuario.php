<?php

namespace App\Models;

use Developer\DB\Sql;
//use App\Models\Usuario;

class Usuario
{
    private $login;
    private $senha;
    private $tipo;  //é uma variável exclusiva em código (não possui correspondente no BD)
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
        
        if($this->getTipo()) {
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
        /*
        1º Teste
        Verifica se a consulta sql retornou algum valor a variavel $result
        E se o getTipo retorna valor igual a 1, que representa o tipo professor.
        2º Teste
        Verifica se a consulta sql retornou algum valor a variavel $result
        Caso positivo, significa que o primeiro teste falhou apenas porque o tipo recebeu valor 0
        Ou seja, o usuario é do tipo aluno.
        3º
        Caso a variavel não tenha valor setado, retorna -1.
        Lembrando que a consulta retorna um id, que necesariamente é maior que zero.
        Portanto, o valor -1 representa uma falha de login
        */ 
        if(isset($result[0]) 
           && $this->getTipo()) {
            return $result[0]['p_id'];
        }else if(isset($result[0]) ) {
            return $result[0]['a_id'];
        }
            return -1;
    }
}
