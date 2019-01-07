<?php

try {
    $db = parse_ini_file("configs/database.ini");
} catch (Exception $e) {
    new CustomError($e->getMessage());
}

try {
    $conn = new PDO($db['DB_CONNECTION'].":host=".$db['DB_HOST'], $db['DB_USERNAME'], $db['DB_PASSWORD']);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE ".$db['DB_DATABASE'];

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $conn = new PDO($db['DB_CONNECTION'].":dbname=".$db['DB_DATABASE'].";host=".$db['DB_HOST'], $db['DB_USERNAME'], $db['DB_PASSWORD']);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="CREATE TABLE userdata(UID INT UNSIGNED NOT NULL AUTO_INCREMENT, Name VARCHAR(50) NOT NULL, Age TINYINT UNSIGNED NOT NULL, Email VARCHAR(50) NOT NULL, Phone VARCHAR(20) NOT NULL, Gender ENUM('male','female') NOT NULL, PRIMARY KEY (UID)) ENGINE = InnoDB;";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table Userdata created successfully.";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>