<?php
namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class UserDAO
{

    public function findUser($login)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM user WHERE login = '$login';");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}