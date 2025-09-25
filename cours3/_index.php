<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../cours1/style.Css">
    <title>Tableaux et Boucle
        
    </title>
</head>
<body>
<?php
$fruit = ['pomme', 'banane', 'pastèque', 'peche'];

var_dump($fruit);
echo "<br>";
print_r($fruit);
echo "<br>";

echo "$fruit[1] <br>";

$personne = ['nom' => 'Alex', 'prenom' => 'Dupont', 'age' => 34];

echo "Bonjour je m'appelle $personne[nom] $personne[prenom] j'ai $personne[age] ans <br>";
print_r($personne);
echo "<br>";

$personne1 = ['nom' => ['nom1'=>'Alex','nom2'=>'Alex'],
             'prenom' => 'Dupont', 
            'age' => 34];





$x = 2;

echo 'Post incrémentation pour $x : '.$x++.'<br>';
echo 'Post incrémentation pour $x : '.$x.'<br>';

echo 'Pré incrémentation pour $x : '.++$x.'<br>';
echo 'Pré incrémentation pour $x : '.$x.'<br>';

?>

<?php
// ============================ BOUCLE ======================

$x = 0;

while ($x < 10){
    $x++;
    echo "caca <br>";
}

for ($i=0; $i<5; $i++) {
    echo"CACA <br>";
}

$user = array(
        'profil' => array('nom' => 'Alex', 'prenom' => 'Dupont', 'age' => 34),
        'media' => array('https://parcsaintecroix.com/wp-content/uploads/2024/06/cp-e-wittwer-6-2-500x500-ad0950baee13.png', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8qo3-lQBYgpy1ZtjSJJf1CUu-2iyv_YT26Q&s','https://parcsaintecroix.com/wp-content/uploads/2022/09/IMG_8245-bao-scaled-500x500-ad0950baee13.jpg'),
        'fruits' => array('a' => 'orange', 'b' => 'kiwi')
    );



echo "<br>START EXOS<br>";

foreach ($user as $k => $v) {

    if ($k === 'profil') {
        foreach ($user['profil'] as $key => $value) {
            echo "$key $value<br>";
        }

    } elseif ($k === 'media') {
        for ($j = 0; $j < count($user['media']); $j++) {
            echo "<img src=" . $user['media'][$j] . "><br>";
        }

    } else {
        foreach ($user['fruits'] as $fruit) {
            echo "$fruit<br>";
        }
    }
}

echo "<br>END EXOS<br>";





















?>



</body>
</html>