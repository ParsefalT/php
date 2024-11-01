<?php 
// connect to db, and execute a query;
namespace Core;
use PDO;

class DataBase {
    public $connection;
    public $statement;

    public function __construct($config, $username = "pars", $password = "12345") {

        $dns = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute(params: $params);

        return $this;
    }

    public function getAll($arg_pdo) {
        return $this->statement->fetchAll($arg_pdo);
    }

    public function find() {
        return $this->statement->fetch();
    }
    public function findOrFail() {
        $result = $this->find();
        if(!$result) {
            abort();
        }
        return $result;
    }
}