<?php

namespace App\Models;
include '../../developer/DB/Sql.php';
use Developer\DB\Sql;

class Alternativa
{
    private $id;
    private $qId;
    private $valor;
    private $texto;

    public function getId():int{ return $this->id; }
    public function setId(int $id){ $this->id = $id;}

    public function getQId():int{ return $this->qId; }
    public function setQId(int $qId){ $this->qId = $qId;}

    public function getValor():int{ return $this->valor; }
    public function setValor(int $valor){ $this->valor = $valor;}

    public function getTexto():string{ return $this->texto; }
    public function set(string $texto){ $this->texto = $texto;}

    public static function listar(int $qId)
    {
        $sql = new Sql();
        $dados = $sql->select('SELECT * FROM alternativas WHERE fk_q_id = '.$qId);

        return json_encode($dados);
    }

    public function acess(int $id):int
    {
        $sql = new Sql();
        $dados = $sql->select('SELECT * FROM alternativas WHERE alt_id = '.$id);

        if(isset($dados[0])) {
            $this->setid($dados[0]['alt_id']);
            $this->setQId($dados[0]['fk_q_id']);
            $this->setvalor($dados[0]['alt_valor']);
            $this->setTexto($dados[0]['alt_texto']);                    
            return 1;
        }
            return 0;   
    }

    public static function create(array $dados)
    {
        $sql = new Sql();
        $sql->query('INSERT INTO alternativa (alt_texto,alt_valor,fk_Questao_que_id) VALUES ( :T,:V,:FK)', 
            array(
                ':T'=>$dados['texto'],
                ':V'=>$dados['valor'],
                ':FK'=>$dados['fk_Questao_que_id']
            )
        );
    }

    public function save()
    {
        $sql = new Sql();
        $sql->query('UPDATE questoes SET fk_q_id = :QI, alt_valor = :V, alt_texto = :T WHERE alt_id = :I', 
            array(
                ':QI'=>$this->getQId(),
                ':V'=>$this->getValor(),
                ':T'=>$this->getTexto(),
                ':I'=>$this->getId()
            )
        );
    }

}