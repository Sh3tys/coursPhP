<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./style.Css">
    <title>Syntaxe
    </title>
</head>
<body>

<?php

    echo "<h1>Test 1</h1>";

?>
    <h1><?php echo "Test 2" ?></h1>

    <h1><?="Teste 3"?></h1>

<?php
//Déclaration de variable
$toto = "toto"; //string
$tata = 1; // int
$vrai = true; //true or false
$vide = NULL; //sans typage

echo "$tata<br>";
echo "$toto<br>";

$prenom = "Michael";
$nom = "Jojo";

?>

<?php

echo "Bonjour $prenom $nom <br>";
echo "Bonjour ".$prenom." ".$nom."<br>";

//============= Tableau =======================

$tab = array();
$tab2 = [];

echo gettype($prenom); //connaitre le typage d'une variable
echo "<br>";

var_dump($tab); // debug objet / variable

echo "<br>";


$prenom = "Pierre";
$nom = "Giraud";
$age = 28;

echo "Bonjour, je m'appelle $nom $prenom, j'ai $age ans !";
echo "<br>";

?>


<?php

$a = 2;
$b = 3;

echo $a + $b;
echo "<br>";

echo $a - $b;
echo "<br>";

echo $a * $b;
echo "<br>";

echo $a / $b;
echo "<br>";

echo $a / $b;
echo "<br>";

?>


<?php
 echo "debut exos <br>";
$d = 5;
$e =  7;

$f = $d * $e;
echo $f;
echo "<br>";

$g = $f / $d;
echo $g;
echo "<br>";

 echo " fin exos <br>";

?>





</body>
</html>