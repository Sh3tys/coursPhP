<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fonctions</title>
</head>
<body>
  <h1>Les fonctions</h1>

  <?php 
    /*
      => Déclarer une fonction
      function <nom de la fonction unique>(<nom des paramètres>,<nom des paramètres> )
      {
        //instructions
        // return <valeur>; (optionnel)
      }

      //Appeler une fonction
      <nom de la fonction unique>(<nom des paramètres>,<nom des paramètres> );

    */

    function ma_fonction(){
      
      echo "Hello world";

      return true;
      return $variable;
      return $a+$b;
      return 'toto';
      return array();
    }
    
    ma_fonction();


    echo "<br>";


    //Fonction avec des paramètres

    $nbrBis1 = 5;
    $nbrBis2 = 30;

    function addition($nbr1= 3, $nbr2 = null){
      $result = $nbr1 + $nbr2;
      echo "Le resultat est $result<br>";
    }

    addition($nbrBis1, $nbrBis2);

    
    //Portée de variable 
    $nbrBis1 = 5;
    $nbrBis2 = 50;

    function additionBis(){
      global $nbrBis1,  $nbrBis2;

      $result =  $nbrBis1 +  $nbrBis2;
      echo "Le resultat bis est $result<br>";
    }

    additionBis();
   

    //Fonction anonyme
    $greet = function($name){
      echo "Bonjour $name<br>";
    };

    $greet("Mbappé");
    $greet("Toto");

    $message = "Salut";

    $retour = function($nom) use ($message){
      return "$message $nom<br>";
    };

    $retour1 = function($nom) use ($message){
      return "$message $nom<br>";
    };

    echo $retour("Antoine");
    echo $retour1("Michel");


    //Fonction qui retourne un resultat grâce à return
    function additionBis2($nbr1, $nbr2= 4){
      $result = $nbr1 + $nbr2;
      return $result;
    } 


    $addition = additionBis2(1, 0);

    if($addition){
      echo "Le resultat est $addition<br>";
    }


    //Fonction variables
    function foo(){
      echo "dans foo()<br>";
    }

    $func = 'foo';
    $func();

    function bar($arg = ''){
      echo "Dans bar() l'argument était $arg.<br>";
    }

    $func = 'bar';
    $func('test');


    //Fonction fléchées
    // C'est ne mannière simplifiée d'écrire une fonction anonyme 

    $y = 1;

    $fn1 = fn($x)=> $x + $y;

    //equivalent
    // $fn1 = function($x) use ($y){
    //   return $x +$y;
    // }

    echo $fn1(3);


    //Fonction récursive
    
    function factorielle($n){
      if($n <=1) return 1;
      var_dump($n);
      return $n *factorielle($n-1);
    }

    echo factorielle(5); //120

    echo '<br>';

    //tableau imbriqué
    $donnees = [1, [2, 3], [4, [5 , 6]]];

    function afficherElements($array){
      foreach($array as $element){
        if(is_array($element)){
          afficherElements($element);
        }else{
          echo $element."<br>";
        }
      }
    }

    afficherElements($donnees);  



  ?>