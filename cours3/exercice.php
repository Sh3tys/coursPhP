<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../cours1/style.Css">
    <title>Exercice 
        
    </title>
</head>
<body>

<?php
echo "Exo 1";
for ($i = 0; $i <= 10; $i++){
    echo $i*5;
    echo "<br>";
}

echo "Exo 1bis <br>";
for ($i = 0; $i < 10; $i++){
    for ($j = 0; $j <= 10; $j++){
        echo $i*$j;
        echo "<br>";
    }
    echo "<br>";
    
}    

echo "Exo 2 <br>";

for ($i=4; $i <= 12; $i++){
    echo $i;
    echo "<br>";
}

echo "Exo 3 <br>";
  $note_maths = 15;
  $note_francais = 12;
  $note_histoire_geo = 9;
  $moyenne = ($note_maths + $note_francais + $note_histoire_geo)/3;
  echo 'La moyenne est de '.$moyenne.' / 20.';
  echo "<br>";

echo "Exo 4<br>";

$tab = ['France' => 'Paris', 'Allemagne' => 'Berlin', 'Italie' => 'Rome'];
foreach($tab as $k => $v){
 echo "$v est en $k <br>";
}

echo "Exo 5<br>";
$testListe= array(
      0 => array(
        'profil' => array('prenom' => 'George', 'nom' => 'lolo', 'Monsieur'),
        'preferences' => array('sport', 'sortir entre amis', 'voyages'),
        'reseaux_sociaux' => array('Facebook', 'Instragram')
      ),
      1 => array(
        'profil' => array('prenom' => 'Marine', 'nom' => 'Dupont', 'Madame'),
        'preferences' => array('shopping', 'sortir entre amis', 'voyages'),
        'reseaux_sociaux' => array('Facebook', 'Instragram', 'Youtube')
      ),
      2 => array(
        'profil' => array('prenom' => 'Mario', 'nom' => 'Dedé', 'Monsieur'),
        'preferences' => array('sortir entre amis', 'voyages'),
        'reseaux_sociaux' => array('Instragram', 'Youtube')
      )
    );

foreach ($testListe as $k => $v){
    foreach ($v as $ke => $va) {
        foreach ($va as $key => $value) {
            echo "$key $value<br>";
        }
    }
}


echo "<br><br>Exo 6<br><br>";


$user = array(
"profil" => array('prenom' => 'tota', 'nom' => 'tata', 'age' => 18 ),

"media" => array('https://assets.pokemon.com/assets/cms2/img/pokedex/detail/001.png', 
                   'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/002.png', 
                     'https://assets.pokemon.com/assets/cms2/img/pokedex/detail/003.png'),

'fruits'=> array('a' => 'orange', 'b' => 'banane', 'c' => 'pomme')
   );

$i = 0;
$tab = array();

function sansB($user, $i, $tab) {
    if ($i > 3) {
        return;
    } else {
        switch ($i) {
            case 0:
                echo "PROFILE <br>";
                foreach ($user['profil'] as $key => $value) {
                    echo "$key $value<br>";
                }
                break;

            case 1:
                echo "MEDIA <br>";
                for ($j = 0; $j < count($user['media']); $j++) {
                    echo "<img src='" . $user['media'][$j] . "'><br>";
                }
                break;

            case 2:
                echo "FRUITS <br>";
                foreach ($user['fruits'] as $fruit) {
                    echo "$fruit<br>";
                }
                break;
        }
        $tab[] = $i;
        if (count($tab) <= 3) {
            sansB($user, $i + 1, $tab);
        }
    }
}

sansB($user, $i, $tab);



echo "<br><br>Exo 7<br><br>";
$age = 22;
function testAge($age,){

    if($age < 18){
        echo "Vous êtes mineur";
    } else {
        echo "vous êtes majeur";
    }
}

testAge($age);


echo "<br><br>Exo 8<br><br>";

    // Définir une variable nom puis lui assigner Martin.
    // Définir une variable anneeNaissance puis lui assigner 2000.
    // Afficher à l’écran « Bonjour Mr Martin vous avez 21 ans ». 
    // Martin et 21 sont bien sûr issus des variables nom et anneeNaissance. 
    // Le calcul de l’âge est simplement le résultat de l’année en cours (ici 2021) moins l’année de naissance

    // ------------------------------------------------------------------------------------

$nom = "Martin";
$anneeNaissance = 2000;

function printName($n,$a,){
     $a = 2021 - $a;
    echo "Bonjour Mr $n vous avez $a ans <br>";
}

printName($nom, $anneeNaissance,);



    // Exercice 9
    // Écrivez une expression conditionnelle utilisant les variables $age et $sexe dans une instruction if 
    // pour sélectionner une personne de sexe féminin dont l’âge est compris entre 21 et 40 ans et 
    // afficher un message de bienvenue approprié("Bienvenue madame").
    $age=25;
    $sexe="feminin";
    if ($age > 21 && $age <= 40 && $sexe === 'feminin') {
        echo "Bienvenue madame <br>";
    }



    // ------------------------------------------------------------------------------------

    // Exercice 10
    // Quelle syntaxe permet d'afficher le deuxième élément du tableau $cocktails ?
    $cocktails = array('Mojito', 'Long Island Iced Tea', 'Gin Fizz', 'Moscow mule');

    echo "$cocktails[1] <br>";

    // ------------------------------------------------------------------------------------

    $fruits = array('orange', 'banane', 'fraise', 'pomme', 'framboise');

    // Exercice 11
    // J'aimerais connaitre le nombre exact dans un tableau
    echo count($fruits)." <br>";
    // ------------------------------------------------------------------------------------

    // Exercice 12
    // En utilisant la boucle for, afficher la table de fruits.
for($i = 0; $i < count($fruits); $i++){
    echo "$fruits[$i] <br>";
}
    // ------------------------------------------------------------------------------------

    // Exercice 13
    // En utilisant la boucle foreach, afficher la table de fruits.

foreach ($fruits as $v){
        echo "$v <br>";
    }

    // ------------------------------------------------------------------------------------

    // Exercice 14
    // Ecrivez une boucle qui affiche ce qui est demandé    
    // Le nombre de colonne à afficher dépend du n° de ligne, à la ligne i, il faut afficher i colonnes.
    // Résultat attendu :
    // 1
    // 22
    // 333
    // 4444
    // 55555
    // 666666
    // 7777777

    for ($i = 1; $i <= 7; $i++){
        switch ($i){
            case 1 :
                echo "1<br>";
                break;
            case 2 :
                echo "22<br>";
                break;
            case 3 :
                echo "333<br>";
                break;
            case 4 :
                echo "4444<br>";
                break;
            case 5 :
                echo "55555<br>";
                break;
            case 6 :
                echo "666666<br>";
                break;
            case 7 :
                echo "7777777<br>";
                break;
        }
    }

    // ------------------------------------------------------------------------------------

    // Exercice 15
    // Ecrivez une boucle qui affiche ce qui est demandé
    // Résultat attendu :
    // 0000000000
    // 1111111111
    // 2222222222
    // 3333333333
    // 4444444444
    // 5555555555
    // 6666666666


    for ($i = 0; $i <= 6; $i++){
        echo "$i$i$i$i$i$i$i$i$i$i <br>";
    }
    // ------------------------------------------------------------------------------------

    // Exercice 16
    // Créer un tableau de 5 noms (durant, martin , li, wang, fu)
    // Afficher les noms dans un tableau HTML. 
    // La première colonne du tableau HTML contient le numéro de la personne et 
    // la deuxième colonne contient le nom de la personne.
    // La boucle for doit être utilisée pour afficher les données.


    $tab = ["durant", "martin" , "li", "wang", "fu"];

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>";
echo "<th>$tab[0]</th>";
echo "<th>$tab[1]</th>";
echo "</tr>";
echo "<tr>";
echo "<th>$tab[2]</th>";
echo "<th>$tab[3] $tab[4]</th>";
echo "</tr>";
echo "<br>";





    // ------------------------------------------------------------------------------------

    // Exercice 17
    // 13.1 - Créer et initialiser un tableau $notes avec les valeurs suivantes :

    // clé   | valeur
    // --------------
    // said  |  13
    // badr  |  16
    // najat |  15
$tab = ["said" => 13,"badr" => 16,"najat" => 15];
    // 13.2 - Ajouter au  tableau la note 10 de l’étudiant "karim".

$tab["karim"] = 10;
    // 13.3 - Afficher le tableau après l'avoir trier par ordre alphabétique  .
echo ksort($tab);
echo "<br>";
    // 13.4 - Classer les étudiants par ordre de mérite et afficher le tableau.
echo sort($tab);
echo "<br>";
    // 13.5 - Déterminer la moyenne de la classe
    $res = 0;
    $j = 0;

    foreach ($tab as $v ){
    $res += $v;
    $j++;
}

echo $res / $j;
echo "<br>";



// Exercice 18
       
    $ventes = [
        "Alice" => [120, 340, 50, 80],
        "Bob" => [300, 200, 150],
        "Charlie" => [500, 500],
      
        "Diana" => [100, 50, 70, 30],
        "Eve" => [600],
    ];


	//1.	Calculer le total des ventes pour chaque vendeur.
    $res = 0;
foreach($ventes as $k => $v){
    echo "Vendeur $k";
    foreach ($v as $va){
        $res += $va;
    }
    echo ";; Vente: $res <br>";
    $res = 0;
}


	//2.	Trouver le vendeur avec le plus haut total.
    $res = 0;
    $best = 0;
    $name = '';

foreach($ventes as $k => $v){
    foreach ($v as $va){
        $res += $va;
    }
    if ($best < $res ){
        $best = $res;
        $name = $k;
    }
    $res = 0;
}

echo "$name à vendu le plus pour un total de $best <br>";

	//3.	Afficher les vendeurs ayant un total supérieur à 500€.
    $res = 0;
    $best = [];

foreach($ventes as $k => $v){
    foreach ($v as $va){
        $res += $va;
    }
    if (500 < $res ){
        $best[$k] = $res;
    }
    $res = 0;
}

var_dump($best);

	//4.	Trier et afficher tous les vendeurs par ordre décroissant de leur total de ventes.


    $res = 0;
    $best = [];

foreach($ventes as $k => $v){
    foreach ($v as $va){
        $res += $va;
    }
    $best[$k] = $res;
    $res = 0;
}

var_dump($best);
echo "<br>";

echo arsort($best);
var_dump ($best);
echo "<br>";

?>


</body>
</html>