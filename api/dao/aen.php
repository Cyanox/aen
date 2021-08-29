<?php

require_once __DIR__ . '/../utils/database.php';

function insertProduct(array $product) {
    $sql = "INSERT INTO Products (reference, name, type, description, ht, tva, ttc) VALUES (:reference, :name, :type, :description, :ht, :tva, :ttc)";
    insert($sql, $product);
}

function insertReceipt(array $receipt) {
    $sql = "INSERT INTO orders () VALUES (?, ?)";
    insert($sql, $receipt);
}

function insertUser(array $user) {
    $sql = "INSERT INTO users (`username`, `password`, `firstname`, `lastname`, `address`, `zipcode`, `country`, `birthdate`) VALUES (:username, :password, :firstname, :lastname, :address, :zipcode, :country, :birthdate);";
    insert($sql, $user);
}

function getBillById(array $id) {
    $sql = "SELECT id FROM orders WHERE id = :id";
    return select($sql,'no', $id);
}

function getUser(array $user){
    $sql = "SELECT password, rank FROM users WHERE username = :username and password = :password";
    return select($sql,'no', $user);
}

function getUserRank(array $user){
    $sql = "SELECT rank FROM users WHERE username = :username";
    return select($sql, 'no',$user);
}

function getUserProfile(array $user){
    $sql = "SELECT * FROM users WHERE id = :id";
    return select($sql,'no', $user);
}
function getUserBill(array $id){
    $sql = "SELECT * FROM orders WHERE user_ref = :id";
    return select($sql, 'all', $id);
}
function getAllUser(){
    $sql = "SELECT username, firstname, lastname, rank, id FROM users";
    return select($sql,'all');

}

function getOneUser(array $user){
    $sql = "SELECT id, firstname, lastname, rank, address, zipcode, country FROM users WHERE username = :username";
    return select($sql, 'no',$user);
}

function getProductNames(){
    $sql = "SELECT DISTINCT name FROM products";
    return select($sql,'all');
}

function getOneProduct(array $product){
    $sql = "SELECT * FROM products WHERE name = :name";
    return select($sql, 'no',$product);
}

function getOneProductId(array $id){
    $sql = "SELECT * FROM products WHERE reference = :id";
    return select($sql,'no', $id);
}








function getAllProducts(){
    $sql = "SELECT * FROM products";
    return select($sql,'all');
}


function getAllBill(){
    $sql = "SELECT * FROM orders";
    return select($sql,'all');

}


function updateUser(array $user){
    $sql = "UPDATE users SET rank = :rank WHERE id = :id";
    update($sql, $user);
}

function updateProduct(array $products){
    $sql = "UPDATE Products SET reference = :reference, name = :name, type = :type, ht = :ht, tva = :tva, ttc = :ttc WHERE reference = :reference";
    update($sql, $products);
}



function searchUser(string $mail, string $password): ?array {
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




function deleteBill(array $receipt) {
    $sql = "DELETE FROM orders WHERE id = :id";
    delete($sql, $receipt);
}

function deleteProduct(array $product) {
    $sql = "DELETE FROM products WHERE reference = :reference";
    delete($sql, $product);
}

function updateBill(array $receipt){
    $sql = "UPDATE orders SET  WHERE id = :id ";
     update($sql,$receipt);
}

function findCartByUser(array $user){
    $sql = "SELECT id FROM carts WHERE user_ref = :user_ref";
    $params = ['user_ref'=>$user];
    return select($sql, $params);
}

function insertCart(string $cart) {
    $sql = "INSERT INTO carts (`user_ref`) VALUES = ?".$cart;
    return insert($sql);
}

function insertCartProd(array $cart) {
    $sql = "INSERT INTO cart-product (`user_ref`, `product_ref`,`reservedate`) VALUES (:user_ref, :product_ref, :reservedate);";
    return insert($sql, $cart);
}
