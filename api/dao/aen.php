<?php

require_once __DIR__ . '/../utils/database.php';

function insertProduct(array $products) {
    $sql = "INSERT INTO Products (reference, name, type, ht, tva, ttc) VALUES (:reference, :name, :type, :ht, :tva, :ttc)";
    insert($sql, $products);
}

function insertReceipt(string $model, int $capacity) {
    $connection = getDatabaseConnection();
    $sql = "INSERT INTO Bill (model, capacity) VALUES (?, ?)";
    $params = ['model'=>$model, $capacity];
    return databaseInsert($connection, $sql, $params);
}

function insertUser(array $user) {
    $sql = "INSERT INTO users (`username`, `password`, `firstname`, `lastname`, `address`, `zipcode`, `country`, `birthdate`) VALUES (:username, :password, :firstname, :lastname, :address, :zipcode, :country, :birthdate);";
    insert($sql, $user);
}

function getBillById(string $id): ?array {
    $sql = "SELECT id FROM orders WHERE id = :id";
    $params = ['id'=>$id];
    return select($sql, $params);
}

function getUser(string $username, string $password){
    $password_hashed = sha1($password);
    $sql = "SELECT password , rank FROM `users` WHERE username = ? and password = ?";
    // J'ai rajouté username car var_dump(result) ne me ranvoyait que le password et le rang
    // Qaund on rajoute un truc à select ça augmente le rows de 2

    $params = [$username, $password_hashed];
    //['username'=>$username, 'hashpwd'=>$password]
    return select($sql, $params);
}

function getUserRank(string $username){
    $sql = "SELECT rank FROM users WHERE username = ?";
    $params = [$username];
    return select($sql, $params);
}
function getUserProfile(string $username){
    $sql = "SELECT * FROM users WHERE id = ?";
    $params = [$username];
    return select($sql, $params);
}
function getUserBill(string $id){
    $connection = getDatabaseConnection();
    $sql = "SELECT * FROM receipt WHERE userid =".$id;
    return databaseFindAll($connection, $sql);
}
function getAllUser(){
    $connection = getDatabaseConnection();
    $sql = "SELECT username, firstname, lastname, rank, id FROM `users`";
    return databaseFindAll($connection, $sql);

}

function getOneUser(string $username){
    $connection = getDatabaseConnection();
    $sql = "SELECT id, firstname, lastname, rank, address, zipcode, country FROM `users` WHERE username = ?";
    $params = [$username];
    return databaseFindOne($connection, $sql, $params);
}


function getOneProductId(string $id){
    $connection = getDatabaseConnection();
    $sql = "SELECT * FROM products WHERE reference =".$id;
    return databaseFindOne($connection, $sql);
}


function getAllProducts(){
    $connection = getDatabaseConnection();
    $sql = "SELECT * FROM `products`";
    return databaseFindAll($connection, $sql);
}

function getAllProducts(){
    $connection = getDatabaseConnection();
    $sql = "SELECT * FROM products";
    return databaseFindAll($connection, $sql);
}

function getAllBill(){
    $connection = getDatabaseConnection();
    $sql = "SELECT * FROM `receipt`";
    return databaseFindAll($connection, $sql);

}


function updateUser(int $id, int $rank){
    $connection = getDatabaseConnection();
    $sql = "UPDATE `users` SET rank = ? WHERE id = ?";
    $params = [$rank, $id];
    return databaseExec($connection, $sql, $params);
}

function updateProduct(int $id, array $products){
    $connection = getDatabaseConnection();
    $sql = "UPDATE Products set (reference, name, type, ht, tva, ttc) VALUES (:reference, :name, :type, :ht, :tva, :ttc)";
    $params = [$products, $id];
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
