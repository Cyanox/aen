<?php

require_once __DIR__ . '/../utils/database.php';

function insertProduct(string $ref,string $provider, int $price): ?string {
    $connection = getDatabaseConnection();
    $sql = "INSERT INTO Product (ref, provider, price) VALUES (?, ?, ?)";
    $params = [$ref, $provider, $price];
    return databaseInsert($connection, $sql, $params);
}

function insertReceipt(string $model, int $capacity): ?string {
    $connection = getDatabaseConnection();
    $sql = "INSERT INTO Bill (model, capacity) VALUES (?, ?)";
    $params = [$model, $capacity];
    return databaseInsert($connection, $sql, $params);
}

function insertUser(string $mail, string $password, string $firstname, string $lastname, int $rank): ?string {
    $connection = getDatabaseConnection();
    $sql = "INSERT INTO Users (mail, password, firstname, lastname) VALUES (?, ?, ?, ?)";
    $password_hashed = password_hash($password);
    $params = [$mail, $password_hashed, $firstname, $lastname, $rank];
    return databaseInsert($connection, $sql, $params);
}

function getBillById(string $id): ?array {
    $connection = getDatabaseConnection();
    $sql = "SELECT id, model, capacity FROM Plane WHERE id = ?";
    $params = [$id];
    return databaseFindOne($connection, $sql, $params);
}

function getUser(string $username, string $password){
    $connection = getDatabaseConnection();
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT password, rank FROM `users` WHERE username = ? and password = ?";
    $params = [$username, $password];
    return databaseFindOne($connection, $sql, $params);
}

function getUserRank(string $username){
    $connection = getDatabaseConnection();
    $sql = "SELECT rank FROM `users` WHERE username = ?";
    $params = [$username];
    return databaseFindOne($connection, $sql, $params);

}

function getAllUser(){
    $connection = getDatabaseConnection();
    $sql = "SELECT username, firstname, lastname, rank, id FROM `users`";
    return databaseFindAll($connection, $sql);

}

function getAllProducts(){
    $connection = getDatabaseConnection();
    $sql = "SELECT * FROM `product`";
    return databaseFindAll($connection, $sql);

}


function updateUser(int $id, int $rank){
    $connection = getDatabaseConnection();
    $sql = "UPDATE `users` SET rank = ? WHERE id = ?";
    $params = [$rank, $id];
    return databaseExec($connection, $sql, $params);

}

function searchUser(string $mail, string $password): ?array {
    $connection = getDatabaseConnection();
    $where = [];
    $params = [];
    if($model !== null) {
        array_push($where, 'model LIKE ?');
        $params[] = "%". $model . "%"; // eq array_push
    }
    if($capacity !== null) {
        $where[] = 'capacity > ?';
        $params[] = $capacity;
    }
    $sql = "SELECT id, model, capacity FROM Plane";
    if(count($where) > 0) {
        $whereClause = join(" AND ", $where);
        $sql .= " WHERE " . $whereClause;
    }
    $sql .= " LIMIT $offset, $limit";
    return databaseFindAll($connection, $sql, $params);
}

function deleteBill(string $id): ?bool {
    $connection = getDatabaseConnection();
    $sql = "DELETE FROM Bill WHERE id = ?";
    $params = [$id];
    $affectedRows = databaseExec($connection, $sql, $params);
    if($affectedRows !== null) {
        return $affectedRows === 1;
    }
    return null;
}

function deleteProduct(string $id): ?bool {
    $connection = getDatabaseConnection();
    $sql = "DELETE FROM Product WHERE ref = ?";
    $params = [$id];
    $affectedRows = databaseExec($connection, $sql, $params);
    if($affectedRows !== null) {
        return $affectedRows === 1;
    }
    return null;
}

function updateBill(string $id, ?string $model, ?int $capacity): ?bool {
    $connection = getDatabaseConnection();
    $set = [];
    $params = [];
    if($model !== null) {
        array_push($set, 'model = ?');
        $params[] = $model;
    }
    if($capacity !== null) {
        $set[] = 'capacity = ?';
        $params[] = $capacity;
    }
    $setClause = join(", ", $set);
    $sql = "UPDATE Plane SET " . $setClause . " WHERE id = ?";
    $params[] = $id;
    $affectedRows = databaseExec($connection, $sql, $params);
    if($affectedRows !== null) {
        return $affectedRows === 1;
    }
    return null;
}