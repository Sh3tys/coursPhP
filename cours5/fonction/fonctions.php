<?php
$host = "172.19.139.129";
$db = 'repertoire';
$user = "xamppuser";
$pwd = "motdepasse";
$charset= 'utf8';

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try{
    echo "Reussi";
  $mysqlClient = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pwd, $options);

}catch(Exception $e){

  die("Erreur : ".$e->getMessage() );

}

// Permet d'ajouter un USER
function ajoutUser($mysqlClient, $user){

  var_dump($user);

  $sqlQuery = "INSERT INTO users(name, firstname, address, email, password) VALUES (:name, :firstname, :address, :email, :password)";

  //Préparation de la requête
  $addUser = $mysqlClient->prepare($sqlQuery);
  var_dump($addUser);
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
  $sqlQuery = "SELECT * FROM users";

  $userAll = $mysqlClient->prepare($sqlQuery);

  $userAll->execute();

  return $userAll->fetchAll(PDO::FETCH_ASSOC); // permet de récupérer les users dans un tableau php

}





if(isset($_POST) && !empty($_POST)){

  ajoutUser($mysqlClient, $_POST);
}