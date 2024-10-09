<?php 
// connect to db, and execute a query;
class DataBase {
    public $connection;

    public function __construct($config, $username = "pars", $password = "12345") {

        $dns = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query ($query, $params) {
        $statement = $this->connection->prepare($query);
        $statement->execute(params: $params);

        return $statement;
    }
}
