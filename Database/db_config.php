<?php
    // development connection
    $host = "localhost";
    $db = "data_db";
    $user = "root";
    $pass = "";
    $charset = "utf8mb4";

    // remote database connection
    // $host = "remotemysql.com";
    // $db = "vkoSa8vQBz";
    // $user = "vkoSa8vQBz";
    // $pass = "YkSzLKg6Yg";
    // $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset"; 

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

    // require crud document for class and crud functions
    require_once "crud.php";
    require_once "user.php";

    $crud = new crud($pdo);
    $user = new user($pdo);


  

?>