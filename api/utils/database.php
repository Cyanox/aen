<?php

function getDatabaseConnection(): PDO {
    $dbname = 'aen';
    $port = 3306;
    $user = 'root';
    $pwd = '';
    $host = 'localhost';
    return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;port=$port",
        $user,
        $pwd);
}

function databaseInsert(PDO $connection, string $sql, array $params): ?string {
    $statement = $connection->prepare($sql);
    if($statement !== false) {
        $success = $statement->execute($params);
        if($success) {
            return $connection->lastInsertId();
        }
    }
    return null;
}

function databaseFindOne(PDO $connection, string $sql, array $params){
    $statement = $connection->prepare($sql);
    if($statement !== false) {
        $success = $statement->execute($params);
        if($success) {
            if($statement->fetch(PDO::FETCH_ASSOC) == false){
                return null;
            }else{
                return $statement->fetch(PDO::FETCH_ASSOC);
            }
        }
    }
    return null;
}

function databaseFindAll(PDO $connection, string $sql): ?array {
    $statement = $connection->prepare($sql);
    if($statement !== false) {
        $success = $statement->execute();
        if($success) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    return null;
}

function databaseExec(PDO $connection, string $sql, array $params): ?int {
    $statement = $connection->prepare($sql);
    if($statement !== false) {
        $success = $statement->execute($params);
        if($success) {
            return $statement->rowCount();
        }
    }
    return null;
}