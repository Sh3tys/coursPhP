<?php
use App\Repository\UserRepository;
use App\Db\Database;


try{
  $db = new Database($host, $db, $user, $pwd, $charset, $options);
  $repo = new UserRepository($db->getPdo());
}catch(Exception $e){
  die("Erreur : ".$e->getMessage() );
}


if(isset($_POST) && !empty($_POST)){
  
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    if(isset($_POST['suppr']) && !empty($_POST['suppr'])){
      $repo->deleteUser($_POST['id']);
    }else{
      $repo->editUser($_POST);
    }
      
  }else{
      $repo->ajoutUser($_POST);
  }

}


if(isset($_GET) && !empty($_GET)){
  $userSelect = $repo->selectUser($_GET['id']);
}