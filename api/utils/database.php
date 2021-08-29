<?php

function getDatabaseConnection(): PDO {
    $dbname = 'aenv3';
    $port = 3306;
    $user = 'root';
    $pwd = '';
    $host = 'localhost';

    try {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;port=$port", $user, $pwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

// Select dans la BDD
function select($sql, $mode, $params = false )
{
  $connect = getDatabaseConnection();
    try {

      if($params)
      {
          $query = $connect->prepare($sql);
          $query->execute($params);
      }
      else
      {
          $query = $connect->prepare($sql);
          $query->execute();
      }

      if($mode == 'all')
      {
          $data = $query->fetchAll(PDO::FETCH_ASSOC);
          $query->CloseCursor();
          return $data;
      }
      else
      {
          $data = $query->fetch(PDO::FETCH_ASSOC);
          $query->CloseCursor();
          return $data;
      }

    } catch (\Exception $e) {
      echo "Erreur : " . $e->getMessage();
    }
}

// Update dans la BDD
function update($sql, $params = false)
   {
     $connection = getDatabaseConnection();
       try {

         if($params)
         {
             $query = $connection->prepare($sql);
             $query->execute($params);
             //var_dump($query);
         }
         else
         {
             $query = $connection->prepare($sql);
             $query->execute();
         }
       } catch (\Exception $e) {
         echo "Erreur : " . $e->getMessage();
       }
       $query->CloseCursor();
   }

// Insert dans la BDD
function insert($sql, $params = false)
   {
     $connection = getDatabaseConnection();
       try {

         if($params)
         {
             $query = $connection->prepare($sql);
             $query->execute($params);
             return $connection->lastInsertId();
         }
         else
         {
             $query = $connection->prepare($sql);
             $query->execute();
             return $connection->lastInsertId();
         }
       } catch (\Exception $e) {
         echo "Erreur : " . $e->getMessage();
       }
       $query->CloseCursor();
   }

// Delete de la BDD
function delete($sql, $params = false)
{
        $connection = getDatabaseConnection();
          try {

            if($params)
            {
                $query = $connection->prepare($sql);
                $query->execute($params);
            }
            else
            {
                $query = $connection->prepare($sql);
                $query->execute();
            }
          } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage();
          }
          $query->CloseCursor();
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

function databaseFindSort(PDO $connection, string $sql, array $params): ?array {
    $statement = $connection->prepare($sql);
    if($statement !== false) {
        $success = $statement->execute($params);
        if($success) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
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
    //  var_dump($params);
        $success = $statement->execute($params);
        if($success) {
            return $statement->rowCount();
        }
    }
    return null;
}
