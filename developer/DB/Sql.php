<?php

namespace Developer\DB;

class Sql
{
    const DATABASE = 'provasistema';
    const HOSTNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';

    private $conn;

    public function __construct()
    {
        $this->conn = new \PDO(
            'mysql:host='.Sql::HOSTNAME.';dbname='.Sql::DATABASE,
            Sql::USERNAME, 
            Sql::PASSWORD
        );
    }

    private function setParams($stmt, $params = array())
    {
        foreach($params as $key => $value)
        {
            $this->bindParam($stmt, $key, $value);
        }
    }

    private function bindParam($stmt, $key, $value)
    {
        $stmt->bindParam($key, $value);
    }

    public function query(string $rawQuery, array $params = array()):int
    {
        $stmt = $this->conn->prepare($rawQuery);
 
        $this->setParams($stmt, $params);
        //echo $rawQuery;
        $stmt->execute();
        //if (!$stmt->execute()) {
            //print_r($stmt->errorInfo());
        //}
        return $stmt->rowCount();
    }

    public function select(string $rawQuery, $params = array()):array
        {
            $stmt = $this->conn->prepare($rawQuery);

            $this->setParams($stmt, $params);
            
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
}



?>