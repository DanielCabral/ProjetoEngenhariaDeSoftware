<?php

namespace App\Models;
include '../../developer/DB/Sql.php';
use Developer\DB\Sql;

class Questao 
{
    private $id;
    private $tipo;
    private $texto;

    public function getId():int{ return $this->id; }
    public function setId(int $id){ $this->id = $id; }

    public function getTipo():int{ return $this->tipo; }
    public function setTipo(int $tipo){ $this->tipo = $tipo; }

    public function getTexto():string{ return $this->texto; }
    public function setTexto(string $texto){ $this->texto = $texto; }
    
    public function generateId():int
    {
        $sql = new Sql();
        $idG = $sql->select('SELECT MAX(que_id) as id FROM questao');
        return $idG[0]['id'];
    }

    public static function listar()
    {
        $sql = new Sql();
        $dados = $sql->select('SELECT * FROM questoes');

        return json_encode($dados);
    }

    public function acess(int $id):int
    {
        $sql = new Sql();
        $dados = $sql->select('SELECT * FROM questoes WHERE q_id = '.$id);

        if(isset($dados[0]))
        {
            $this->setid($dados[0]['q_id']);
            $this->setTipo($dados[0]['q_tipo']);
            $this->setTexto($dados[0]['q_texto']);                    

            return 1;
        }else{
            return 0;
        }   
    }

    public static function create(array $dados)
    {
        $sql = new Sql();
        $sql->query('INSERT INTO questao (que_id,que_tipoDequestao, que_texto) VALUES (:ID, :TI, :TE)', 
            array(
                ':ID'=>$dados['id'],
                ':TI'=>$dados['tipo'],
                ':TE'=>$dados['texto']
            )
        );
    }
    public static function delete(array $dados)
    {
        $sql = new Sql();
        $sql->query('DELETE FROM questao where que_id=:ID', 
            array(
                ':ID'=>$dados['id'],
            )
        );
    }

    public function save()
    {
        $sql = new Sql();
        $sql->query('UPDATE questoes SET q_tipo = :TI, q_texto = :TE, q_id = :TE WHERE q_id = :I', 
            array(
                ':TI'=>$this->getTipo(),
                ':TE'=>$this->getTexto(),
                ':I'=>$this->getId()
            )
        );
    }
}