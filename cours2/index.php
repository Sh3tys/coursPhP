<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../cours1/style.Css">
    <title>Condition
    </title>
</head>
<body>
<?php
$x = 5;

if($x > 5) { // controle la condition par rapport aux données
    // instruction
    echo "La variable x est strictement supérieur à 5. <br>";


} elseif ($x < 5 ) {
    echo "La variable est strictement supérieur à 5. <br>";
} else {
    echo "La variable est égale à 5. <br>";
}

if ($x === 5) { //test valeur + typage

} elseif ($x == 5) { // test valeur

}

if ($x !== 5) { //test la différence de valeur et de typage

} elseif ($x != 5) { // test la différence de valeur

}


$age=18;



if ( $age <= 4){
echo "bb <br>";
}elseif ( $age <= 11){
    echo "enfant <br>";
}elseif ( $age <= 17){
    echo "ados <br>";
}else{
    echo "adulte <br>";
}


switch ($age){
    case $age <= 4 :
        echo "bb <br>";
        break;

    case $age <= 11 :
        echo "enfant <br>";
        break;

    case $age <= 17 :
        echo "ados <br>";
        break;

    default :
    echo "adulte <br>";

}

?>





</body>
</html>