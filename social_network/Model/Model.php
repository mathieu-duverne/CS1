<?php

require('_config/Database.php');


class Model
    {

        protected $pdo;

    public function __construct(){

        $this->pdo = Database::getPdo();

    }

    public static function send(PDO $pdo,string $request_body,array $request_parameters): bool|string|PDOStatement
    {
        try {
            $prepare_statement = $pdo->prepare($request_body);
            $prepare_statement->execute($request_parameters);
            return $prepare_statement;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}