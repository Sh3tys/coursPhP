<?php include_once "fonctions/fonctions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    table,
    td {
        border: 1px solid #333;
        text-align: center;
    }
    table{
      width: 100%;
      font-family: arial, sans-serif;
      border-collapse: collapse;
    }

    th, td{
      border: 1px solid #ccc;
      padding: 8px;
    }
    thead,
    tfoot {
        background-color: #333;
        color: #fff;
    }
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    td p{
      line-height: 1.5;
    }
  </style>
</head>
<body>
  <?php include_once "layout/header.php" ?>

  <form action="index.php" method="post">
    <input type="text" name="name" maxlength="50" placeholder="name">
    <input type="text" name="firstname" maxlength="50"  placeholder="firstname">
    <input type="text" name="address"  placeholder="address">
    <input type="email" name="email" maxlength="100"  placeholder="email">
    <input type="text" name="password" maxlength="255"  placeholder="password">
    <button>Enregistrer</button>
  </form>


<?php 
  $userAll = usersAll($mysqlClient);
  if(count($userAll) > 0){
?>
    <table>
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>firstname</th>
          <th>adresse</th>
          <th>email</th>
          <th>password</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($userAll as $key => $user){
        ?>
          <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['name']?></td>
            <td><?=$user['firstname']?></td>
            <td><?=$user['address']?></td>
            <td><?=$user['email']?></td>
            <td><?=$user['password']?></td>
            <td><a href="edit.php?id=<?=$user['id']?>">editer </a> | <a href="suppression.php?id=<?=$user['id']?>">supprimer</a></td>
          </tr>
        <?php }?>
      </tbody> 
    </table>
<?php
  }
?>

</body>
</html>