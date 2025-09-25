<?php
$host = "localhost";
$db = 'repertoire';
$user = "shetys";
$pwd = "shetys123";
$charset= 'utf8';

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try{
  $mysqlClient = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pwd, $options);

}catch(Exception $e){

  die("Erreur : ".$e->getMessage() );

}

// Permet d'ajouter un USER
function ajoutUser($mysqlClient, $user){

  $sqlQuery = "INSERT INTO users(name, firstname, address, email, password) VALUES (:name, :firstname, :address, :email, :password)";

  //Préparation de la requête
  $addUser = $mysqlClient->prepare($sqlQuery);
  //Execution
  $addUser->execute([
    'name' => ($user['name']) ? $user['name'] : NULL,
    'firstname' => ($user['firstname']) ? $user['firstname'] : NULL,
    'address' => ($user['address']) ? $user['address'] : NULL,
    'email' => ($user['email']) ? $user['email'] : NULL,
    'password' => ($user['password']) ? $user['password'] : NULL
  ]);

}

//Afficher tous les users
function usersAll($mysqlClient){
  $sqlQuery = "SELECT * FROM users ORDER BY id DESC";
  $userAll = $mysqlClient->prepare($sqlQuery);
  $userAll->execute();

  return $userAll->fetchAll(PDO::FETCH_ASSOC); // permet de récupérer les users dans un tableau php
}

//Selectionner un user
function selectUser($mysqlClient, $id){
  $sqlQuery = "SELECT * FROM users WHERE id = $id";
  $user = $mysqlClient->prepare($sqlQuery);
  $user->execute();
  return $user->fetch(PDO::FETCH_ASSOC);
}

//Editer un user
function editUser($mysqlClient, $user){
  $sqlQuery = "UPDATE users SET name = :name, firstname= :firstname, address= :address, email = :email, password = :password WHERE id = :id";

  //Préparation de la requête
  $addUser = $mysqlClient->prepare($sqlQuery);
  //Execution
  $addUser->execute([
    'id' => ($user['id']) ? $user['id'] : NULL,
    'name' => ($user['name']) ? $user['name'] : NULL,
    'firstname' => ($user['firstname']) ? $user['firstname'] : NULL,
    'address' => ($user['address']) ? $user['address'] : NULL,
    'email' => ($user['email']) ? $user['email'] : NULL,
    'password' => ($user['password']) ? $user['password'] : NULL
  ]);
}

function deleteUser($mysqlClient, $id){
  $sqlQuery = "DELETE FROM users WHERE id = $id";
  $userDelete = $mysqlClient->prepare($sqlQuery);
  $userDelete->execute();
}


if(isset($_POST) && !empty($_POST)){
  
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    if(isset($_POST['suppr']) && !empty($_POST['suppr'])){
      deleteUser($mysqlClient, $_POST['id']);
    }else{
      editUser($mysqlClient, $_POST);
    }
      
  }else{
      ajoutUser($mysqlClient, $_POST);
  }

}


if(isset($_GET) && !empty($_GET)){
  $userSelect = selectUser($mysqlClient, $_GET['id']);
}