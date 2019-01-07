<?php

include_once 'core/model_interface.php';

class UserDate extends Connection implements Model
{
    private $connection;
    private $tableName = 'userdata';

    public function __construct() {
        parent::__construct();
        $this->connection = parent::connect();
    }

    public function insert($data) //вставка данных
    {
        $query = $this->connection->prepare("INSERT INTO $this->tableName (UID, Name, Age, Email, Phone, Gender) VALUES (:uid, :name, :age, :email, :phone, :gender)");
        $query->bindParam(':uid', $data[0]);
        $query->bindParam(':name', $data[1]);
        $query->bindParam(':age', $data[2]);
        $query->bindParam(':email', $data[3]);
        $query->bindParam(':phone', $data[4]);
        $query->bindParam(':gender', $data[5]);
        $query->execute();
    }

    public function update($data, $id) //обновление данных
    {
        $query = $this->connection->prepare("UPDATE $this->tableName SET UID=:uid, Name=:name, Age=:age, Email=:email, Phone=:phone, Gender=:gender WHERE UID=:id");
        $query->bindParam(':id', $id);
        $query->bindParam(':uid', $data[0]);
        $query->bindParam(':name', $data[1]);
        $query->bindParam(':age', $data[2]);
        $query->bindParam(':email', $data[3]);
        $query->bindParam(':phone', $data[4]);
        $query->bindParam(':gender', $data[5]);
        $query->execute();
    }

    public function select($data = '*') //выборка данных
    {
        $query = $this->connection->query("SELECT $data FROM $this->tableName");
        if($data == '*')
            return $query->fetchAll(PDO::FETCH_ASSOC);
        else
            return $query->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    function delete() //очистка таблицы
    {
        $this->connection->query("DELETE FROM $this->tableName");
    }

}