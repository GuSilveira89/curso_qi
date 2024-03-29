<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class FilmeDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('INSERT INTO filme VALUES (null,?,?,?,?,?);');
        $stmt->bindParam(1, $object->nome);
        $stmt->bindParam(2, $object->ano);
        $stmt->bindParam(3, $object->quantidade);
        $stmt->bindParam(4, $object->secao);
        $stmt->bindParam(5, $object->faixa_etaria);
        return $stmt->execute();
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM filme WHERE filme_id = $id;");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function findAll()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("select * from filme;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('UPDATE filme SET filme_nome=?,filme_ano=?, filme_quantidade=?, filme_secao=?, filme_faixa_etaria=? WHERE filme_id=?;');
        $stmt->bindParam(1, $object->nome);
        $stmt->bindParam(2, $object->ano);
        $stmt->bindParam(3, $object->quantidade);
        $stmt->bindParam(4, $object->secao);
        $stmt->bindParam(5, $object->faixa_etaria);
        $stmt->bindParam(6, $object->id);
        return $stmt->execute();
    }
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('DELETE from filme where filme_id = ?;');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
