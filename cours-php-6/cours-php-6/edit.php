<?php include_once "fonctions/fonctions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Editer</h1>

  <?php  
  if($userSelect){?>
     <form action="index.php" method="post">
      <input type="hidden" name="id" value="<?=$userSelect['id']?>">
      <input type="text" name="name" maxlength="50" placeholder="name" value="<?=$userSelect['name']?>">
      <input type="text" name="firstname" maxlength="50"  placeholder="firstname" value="<?=$userSelect['firstname']?>">
      <input type="text" name="address"  placeholder="address" value="<?=$userSelect['address']?>">
      <input type="email" name="email" maxlength="100"  placeholder="email" value="<?=$userSelect['email']?>">
      <input type="text" name="password" maxlength="255"  placeholder="password" value="<?=$userSelect['password']?>">
      <button>Enregistrer</button>
    </form>
  <?php }?>
</body>
</html>