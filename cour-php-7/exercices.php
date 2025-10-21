<?php
// Exercice 1 :
// 	1.	Crée une classe User avec les propriétés :
// 	•	$nom
//   •	$prenom
// 	•	$age
// 	2.	Ajoute une méthode sePresenter() qui affiche :
//   “Bonjour, je m’appelle [prenom] [nom] et j’ai [âge] ans.”
// 	3.	Crée deux objets user et appelle la méthode pour chacun.
//   Bonus : ajoute un constructeur pour initialiser les valeurs.
class User{
    public $nom;
    public $prenom;
    public $age;

    public function __construct($prenom="", $nom="", $age=0){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
    }

    public function sePresenter(){
        echo "Bonjour, je m’appelle " . $this->prenom . " " . $this->nom . " et j’ai " . $this->age . " ans. <br>";
    }
}

$user1 = new User();
$user1->nom = "Doe";
$user1->prenom = "John";
$user1->age = 30;
$user1->sePresenter();

$user2 = new User('Toto', 'Smith', 25);
$user2->sePresenter();






// Exercice 2 :
// 	1.	Crée une classe CompteBancaire avec :
// 	•	$proprietaire
// 	•	$solde (privé)
// 	2.	Ajoute un constructeur qui initialise le propriétaire et le solde (par défaut 0).
// 	3.	Ajoute les méthodes :
// 	•	deposer($montant)
// 	•	retirer($montant)
// 	•	afficherSolde()
// 	4.	Empêche le solde de devenir négatif.

// Bonus :
// 	•	Ajoute des getters et setters pour $solde.
// 	•	Affiche une erreur si le retrait dépasse le solde.

class CompteBancaire{
    public $proprietaire;
    private $solde;

    //================CONSTRUCTEUR================
    public function __construct($proprietaire="", $solde=0){
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
    }

    //================GETTER AND SETTER================
    public function getSolde(){
        return $this->solde;
    }

    public function setSolde($solde){
        $this->solde = $solde;
    }

    //================METHODS================
    public function deposer($montant){
        $this->solde += $montant;
        echo $montant . "€ déposés. Nouveau solde : " . $this->solde . "€. <br>";
    }

    public function retirer($montant){
        $this->solde -= $montant;
        if($this->solde < 0){
            echo "Erreur : Solde insuffisant <br>";
            $this->solde += $montant;
        } else {
            echo $montant . "€ retirés. solde : " . $this->solde . "€. <br>";
        }
    }

    public function afficherSolde(){
        echo $this->proprietaire . " à " . $this->solde . "€. <br>";
    }
}





// Exercice 3 : 

// Contexte :
// Tu dois créer un petit système (Gestion d’un personnel scolaire) qui représente les personnes dans une école.
// 	1.	Crée une classe parent "Employe" avec :
// 	•	propriétés : $nom, $salaire
// 	•	méthode afficherInfos() => affiche “Nom : [nom], Salaire : [salaire] €”
// 	2.	Crée deux classes enfants :
// 	•	Professeur → ajoute une propriété $matiere
// 	•	Surveillant → ajoute une propriété $zone
// 	3.	Redéfinis la méthode afficherInfos() dans chaque classe :
// 	•	Professeur → “Professeur [nom], enseigne [matiere], salaire : [salaire] €”
// 	•	Surveillant → “Surveillant [nom], zone : [zone], salaire : [salaire] €”
// 	4.	Crée un tableau avec plusieurs objets (Professeur, Surveillant)
// et affiche leurs informations.

class Employe {
    public $nom;
    public $salaire;

    public function __construct($nom, $salaire) {
        $this->nom = $nom;
        $this->salaire = $salaire;
    }

    public function afficherInfos(){
        echo "Nom : " . $this->nom . ", Salaire : " . $this->salaire . " €. <br>";
    }
}

class Professeur extends Employe {
    public $matiere;

    public function __construct($nom, $matiere, $salaire) {
        parent::__construct($nom, $salaire);
        $this->matiere = $matiere;
    }

    public function afficherInfos(){
        echo "Professeur " . $this->nom . ", enseigne " . $this->matiere . ", salaire : " . $this->salaire . " €. <br>";
    }
}

class Surveillant extends Employe {
    public $zone;

    public function __construct($nom, $zone, $salaire) {
        parent::__construct($nom, $salaire);
        $this->zone = $zone;
    }

    public function afficherInfos(){
        echo "Surveillant " . $this->nom . ", zone : " . $this->zone . ", salaire : " . $this->salaire . " €. <br>";
    }
}

$employes = [];
$prof1 = new Professeur("Dupont", "Mathématiques", 3000);
$prof2 = new Professeur("Durand", "Physique", 3200);
$surv1 = new Surveillant("Martin", "Nord", 2000);
$surv2 = new Surveillant("Bernard", "Sud", 2100);

$employes = [$prof1, $prof2, $surv1, $surv2];

foreach ($employes as $employe) {
    $employe->afficherInfos();
}



// Exercice 4 : 

// Crée une classe parent Transport avec :
// 	•	une propriété $nom
// 	•	un constructeur qui initialise $nom
// 	•	une méthode deplacer() qui affiche :
// “Le moyen de transport se déplace.”
// 	2.	Crée trois classes enfants qui héritent de Transport :
// 	•	Voiture
// 	•	Train
// 	•	Avion
// 	3.	Dans chaque classe enfants, redéfinis la méthode deplacer() :
// 	•	Voiture → “La voiture roule sur la route”
// 	•	Train → “Le train circule sur les rails”
// 	•	Avion → “L’avion vole dans le ciel”
// 	4.	Dans ton script principal :
// 	•	Crée un tableau $transports contenant plusieurs objets de chaque type.
// 	•	Parcours le tableau avec une boucle foreach et appelle deplacer() sur chacun.

class Transport{
    public $nom;
    
    public function __construct($nom){
        $this->nom = $nom;
    }

    public function deplacer(){
        echo "Le moyen de transport se déplace. <br>";
    }
}

class Voiture extends Transport {
    public function deplacer(){
        echo "La voiture roule sur la route.". $this->nom ."<br>";
    }
}
class Train extends Transport {
    public function deplacer(){
        echo "Le train circule sur les rails. ". $this->nom ." <br>";
    }
}

class Avion extends Transport {
    public function deplacer(){
        echo "L’avion vole dans le ciel. ". $this->nom ." <br>";
    }
}

$transports = [
    new Voiture("Renault"),
    new Voiture("Peugeot"),
    new Train("TGV"),
    new Train("Intercités"),
    new Avion("Airbus"),
    new Avion("Boeing")
];
foreach($transports as $transport){
    $transport->deplacer();
}

// Exercice 5 : 
// Crée une classe GenerationPwd avec :
// 	•	une propriété statique $longueur
// 	•	une méthode static generation() qui affiche le mot de passe générer

// donner une longueur 10
// générer un mot de passe et l'afficher

class GenerationPwd{
    public static $longueur = 20;

    public static function generation(){
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
        $pwd = '';
        for($i=0; $i<self::$longueur; $i++){
            $pwd .= $chars[rand(0, strlen($chars)-1)];
        }
        return $pwd;
    }
}

echo "Mot de passe généré : " . GenerationPwd::generation() . "<br>";
