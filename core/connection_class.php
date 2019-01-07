<?php

class Connection
{
    private $connection;
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function __construct()
    {
        try {
            $db = parse_ini_file("configs/database.ini"); //парсинг файла с настройками бд
        } catch (Exception $e) {
            new CustomError($e->getMessage());
        }

        $this->connection = $db['DB_CONNECTION'];
        $this->host = $db['DB_HOST'];
        $this->db = $db['DB_DATABASE'];
        $this->user = $db['DB_USERNAME'];
        $this->pass = $db['DB_PASSWORD'];
        $this->charset = $db['DB_CHARSET'];
    }

    public function connect() //подключение к бд
    {
        $connection = "$this->connection:host=$this->host;dbname=$this->db;charset=$this->charset";

        try {
            $dbh = new PDO($connection, $this->user, $this->pass);
        } catch (PDOException $e) {
            new CustomError($e->getMessage());
        }

        return $dbh;
    }
}
