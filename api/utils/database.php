<?php

function getDatabaseConnection(): PDO {
    $dbname = 'aen';
    $port = 3306;
    $user = 'root';
    $pwd = 'root';
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
function select($sql, $params = false)
{
  $connect = getDatabaseConnection();
    try {

      if($params)
      {
          $query = $connect->prepare($sql);
          $query->execute($params);
//          var_dump($query);
      }
      else
      {
          $query = $connect->prepare($sql);
          $query->execute();
      }
      $data = $query->fetch();
    } catch (\Exception $e) {
      echo "Erreur : " . $e->getMessage();
    }
    $query->CloseCursor();
    return $data;
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
             var_dump($query);
         }
         else
         {
             $query = $connect->prepare($sql);
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
             var_dump($query);
         }
         else
         {
             $query = $connect->prepare($sql);
             $query->execute();
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
                var_dump($query);
            }
            else
            {
                $query = $connect->prepare($sql);
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
