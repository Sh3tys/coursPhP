<?php
namespace App\Repository;
use PDO;

class UserRepository{
  private PDO $pdo;

  public function __construct(PDO $pdo){
    $this->pdo = $pdo;
  }

  public function ajoutUser($user){

    $sqlQuery = "INSERT INTO users(name, firstname, address, email, password) VALUES (:name, :firstname, :address, :email, :password)";

    $addUser = $this->pdo->prepare($sqlQuery);
    //Execution
    $addUser->execute([
      'name' => ($user['name']) ? $user['name'] : NULL,
      'firstname' => ($user['firstname']) ? $user['firstname'] : NULL,
      'address' => ($user['address']) ? $user['address'] : NULL,
      'email' => ($user['email']) ? $user['email'] : NULL,
      'password' => ($user['password']) ? $user['password'] : NULL
    ]);
  }

  public function usersAll(){
    $sqlQuery = "SELECT * FROM users ORDER BY id DESC";
    $userAll = $this->pdo->prepare($sqlQuery);
    $userAll->execute();

    return $userAll->fetchAll(PDO::FETCH_ASSOC); // permet de récupérer les users dans un tableau php
  }

  public function selectUser($id){
    $sqlQuery = "SELECT * FROM users WHERE id = $id";
    $user = $this->pdo->prepare($sqlQuery);
    $user->execute();
    return $user->fetch(PDO::FETCH_ASSOC);
  }

  //Editer un user
  public function editUser($user){
    $sqlQuery = "UPDATE users SET name = :name, firstname= :firstname, address= :address, email = :email, password = :password WHERE id = :id";

    //Préparation de la requête
    $addUser = $this->pdo->prepare($sqlQuery);
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

  public function deleteUser($id){
      $sqlQuery = "DELETE FROM users WHERE id = $id";
      $userDelete = $this->pdo->prepare($sqlQuery);
      $userDelete->execute();
    }


}