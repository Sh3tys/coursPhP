<?php

$personne = [
    'nom' => 'Doe',
    "age" => 30,
];


class Personne {
    public $nom;
    public $age;

    public function sePresenter() {
        echo "Bonjour, je m'appelle " . $this->nom . ", j'ai " . $this->age . " ans. <br>";
    }
}

$personne1 = new Personne();

$personne1->nom = 'Doe';
$personne1->age = 30;

$personne1->sePresenter();
//var_dump($personne1);

$personne2 = new Personne();

$personne2->nom = 'Smith';
$personne2->age = 25;

$personne2->sePresenter();
//var_dump($personne2);


class Compte{
    public $solde;

    public function __construct($prix){
        $this->solde = $prix;
    }

    public function afficherSolde(){
        echo "Le solde du compte est de " . $this->solde . "€. <br>";
    }
}

$compte = new Compte(300);
$compte->afficherSolde();

//encapsulation
//public
//private
//protected

class Rectangle {
    private $longueur;
    private $largeur;

    public function setLongueur($longueur){
        $this->longueur = $longueur;
    }
    public function getLongueur(){
        return $this->longueur;
    }
    
    public function setLargeur($largeur){
        $this->largeur = $largeur;
    }
    public function getLargeur(){
        return $this->largeur;
    }

}

$rectangle = new Rectangle();

$rectangle->setLongueur(10);
$rectangle->setLargeur(5);
echo "Longueur : " . $rectangle->getLongueur() . "<br>";
echo "Largeur : " . $rectangle->getLargeur() . "<br>";

//Heritage
//l'heritage permet a une class enfant d'heriter des proprietes et methodes d'une class parent

class Animal {
    protected $espece;

    public function crier(){
        echo "L'animal CRIE. <br>";
    }
}
class Chien extends Animal {
    
    public function crier(){
        echo "Le chien aboie. <br>";
    }

    public function setEspece($race){
        $this->espece = $race;
    }
}

$chien = new Chien();
$chien->crier();
$chien->setEspece('Labrador');

//Polymorphisme
//Le polymorphisme permet a des methodes d'avoir le meme nom mais des comportements differents selon la class 
class Forme{
    
    public function dessiner(){
        echo "dessiner un dessin <br>";
    }
}

class Cercle extends Forme {
    public function dessiner(){
        echo "dessiner un cercle <br>";
    }
}

//interfaces
//Une interface est un contrat qui definit des methodes qu'une class doit implementer
interface ModePaiement {
    public function payer($montant);
}

class CarteCredit implements ModePaiement {
    public function payer($montant){
        echo "Payer " . $montant . "€ avec une carte de credit. <br>";
    }
}

class PayPal implements ModePaiement {
    public function payer($montant){
        echo "Payer " . $montant . "€ avec PayPal. <br>";
    }
}

class VirementBancaire implements ModePaiement {
    public function payer($montant){
        echo "Payer " . $montant . "€ par virement bancaire. <br>";
    }
}

class CryptoMonnaie implements ModePaiement {
    public function payer($montant){
        echo "Payer " . $montant . "€ avec de la cryptomonnaie. <br>";
    }
}

function effectuerPaiement(ModePaiement $mode, $montant){
    $mode->payer($montant);
}

effectuerPaiement(new CarteCredit(), 100);
effectuerPaiement(new PayPal(), 150);
effectuerPaiement(new VirementBancaire(), 200);
effectuerPaiement(new CryptoMonnaie(), 250);




//statique
//Une methode ou propriete statique appartient a la class elle meme et non a une instance de la class
class Chrono {
    public static $temps = 0;

    public static function afficherTemps(){
        echo "Le chronometre a demarre ". self::$temps .". <br>";
    }

    public function incrementerTemps(){
        self::$temps++;
    }

};
//Chrono::$temps = 10; //acces a la propriete statique sans instancier la class
Chrono::afficherTemps(); //acces a la methode statique sans instancier la class

$obje1 = new Chrono();
$obje1->incrementerTemps();

$objet2 = new Chrono();
$objet2->incrementerTemps();

Chrono::afficherTemps();


class Calculatrice {
    public static $pi = 3.14159;
    
    public static function carre($nombre){
        return $nombre * $nombre;
    }

    public static function cercleSurface($rayon){
        return self::$pi * self::carre($rayon);
    }
}
echo "pi : " . Calculatrice::$pi . "<br>";
echo "Carre de 5 : " . Calculatrice::carre(5) . "<br>";
echo "Surface d'un cercle de rayon 5 : " . Calculatrice::cercleSurface(5) . "<br>";

//Abstrait
//Une class abstraite ne peut pas etre instanciee directement, elle sert de modele pour d'autres classes
abstract class Forme2 {
    //methode abstraite : aucune implementation
    abstract public function CalculerSurface();

    //methode concrete
    public function afficherMessage(){
        echo "Ceci est une forme !!<br>";
    }

}

class Rectangle2 extends Forme2 {
    private $longueur;
    private $largeur;

    public function __construct($longueur, $largeur){
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function CalculerSurface(){
        return $this->longueur * $this->largeur;
    }
}

class Cercle2 extends Forme2 {
    private $rayon;

    public function __construct($rayon){
        $this->rayon = $rayon;
    }

    public function CalculerSurface(){
        return pi() * $this->rayon * $this->rayon;
    }
}

$rectangle2 = new Rectangle2(5, 10);
$rectangle2->afficherMessage();
echo "Surface du rectangle : " . $rectangle2->CalculerSurface() . "<br>";

$cercle2 = new Cercle2(3);
$cercle2->afficherMessage();
echo "Surface du cercle : " . $cercle2->CalculerSurface() . "<br>";

/*
//Namespaces
//Les namespaces permettent d'organiser le code et d'eviter les conflits de noms entre les classes, fonctions et constantes
//par convention les class on des noms différents

//fichier A.php
namespace App\Models;  // src/Models/User.php
class User{
    public function afficherNom(){
        echo "Nom de l'utilisateur : John Doe <br>";
    }
}

//fichier B.php
namespace App\Admin; // src/Admin/User.php
class User{
    public function afficherNom(){
        echo "Nom de l'utilisateur : John Doe <br>";
    }
}

require 'A.php';
require 'B.php';

use App\Models\User;

$user1 = new User(); //modele App\Models\User

$user2 = new App\Admin\User();//admin App\Admin\User

*/
