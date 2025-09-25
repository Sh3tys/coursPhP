<?php include_once "fonctions/fonctions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Supprimer un utilisateur</h1>

  <?php  
  if($userSelect){?>
     <form action="index.php" method="post">
      <input type="hidden" name="id" value="<?=$userSelect['id']?>">
      <input type="hidden" name="suppr" value="1">
      <button>La suppression est définitive</button>
    </form>
  <?php }?>
</body>
</html>