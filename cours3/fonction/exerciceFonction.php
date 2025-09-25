<?php
// Exercice 00 - Calculer la TVA
function calculTVA($prixHT, $taux = 20) {
  return $prixHT * (1 + $taux / 100);
}
echo "Prix TTC : " . calculTVA(100) . "<br>"; // 120

// Exercice 00BIS - Calculer une commission
function calculCommission($montant, $taux = 10) {
  return $montant * $taux / 100;
}
echo "Commission : " . calculCommission(200, 15) . "<br>";

// Exercice 1 - plusGrand
function plusGrand($a, $b) {
  return ($a > $b) ? $a : $b;
}
echo "Plus grand : " . plusGrand(5, 10) . "<br>";

// Exercice 2 - plusPetit
function plusPetit($a, $b) {
  return ($a < $b) ? $a : $b;
}
echo "Plus petit : " . plusPetit(5, 10) . "<br>";

// Exercice 3 - estIlMajeure
function estIlMajeure($age) {
  return $age >= 18;
}
var_dump(estIlMajeure(5));
var_dump(estIlMajeure(34));
echo "<br>";

// Exercice 4 - concatenation
function concatenation($str1, $str2) {
  return $str1 . $str2;
}
echo concatenation("Antoine", "Griezmann") . "<br>";

// Exercice 5 - quiEstLeMeilleurProf
function quiEstLeMeilleurProf() {
  return "Le prof de programmation Web";
}
echo quiEstLeMeilleurProf() . "<br>";

// Exercice 6 - dernierElementTableau
function dernierElementTableau($array) {
  if (empty($array)) return null;
  return $array[count($array)-1];
}
$tableau = ['apple', 'banana', 'cranberry'];
echo "Dernier élément : " . dernierElementTableau($tableau) . "<br>";

// Exercice 7 - verificationPassword 
function verificationPassword($password) {
  return strlen($password) >= 8;
}
var_dump(verificationPassword("abc"));
var_dump(verificationPassword("abcdefgh"));
echo "<br>";

// Exercice 8 - verificationPassword avancé
function verificationPasswordAvance($password) {
  return strlen($password) >= 8 &&
         preg_match('/[0-9]/', $password) &&
         preg_match('/[A-Z]/', $password) &&
         preg_match('/[a-z]/', $password);
}
var_dump(verificationPasswordAvance("Test1234"));
var_dump(verificationPasswordAvance("test"));
echo "<br>";

// Exercice 9 - capital avec switch
function capital($pays) {
  switch (strtolower($pays)) {
    case "france": return "Paris";
    case "allemagne": return "Berlin";
    case "italie": return "Rome";
    case "maroc": return "Rabat";
    case "espagne": return "Madrid";
    case "portugal": return "Lisbonne";
    case "angleterre": return "Londres";
    default: return "Inconnu";
  }
}
echo "Capitale de France : " . capital("France") . "<br>";
echo "Capitale du Brésil : " . capital("Brésil") . "<br>";

// Exercice 10 - somme d’un tableau récursive
function sommeRecursive($array) {
  if (empty($array)) return 0;
  return array_shift($array) + sommeRecursive($array);
}
$scores = [4, 8, 2, 6];
echo "Somme scores : " . sommeRecursive($scores) . "<br>";

// Exercice 11 - compter chiffres d’un entier
function compteChiffres($nombre) {
  if ($nombre < 10) return 1;
  return 1 + compteChiffres(intval($nombre / 10));
}
echo "Nb chiffres de 123456 : " . compteChiffres(123456) . "<br>";

?>
            