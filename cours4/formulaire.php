<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cours1/style.css">
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>

    <!-- Formulaire pour les opérations -->
    <form action="formulaire.php" method="post">
        <input type="number" name="nbr1" placeholder="Nombre 1" required>
        <input type="text" name="signe" placeholder="Signe (+, -, *, /)" required>
        <input type="number" name="nbr2" placeholder="Nombre 2" required>
        <button type="submit">Calculer</button>
    </form>

    <br>

    <!-- Formulaire pour la multiplication -->
    <form action="formulaire.php" method="get">
        <input type="number" name="multiplication" placeholder="Table de multiplication" required>
        <button type="submit">Afficher la table</button>
    </form>

<?php
// ---------------------
// Fonction calculatrice
// ---------------------
function calculer($nbr1, $signe, $nbr2){
    switch ($signe){
        case "+":
            return $nbr1 + $nbr2;
        case "-":
            return $nbr1 - $nbr2;
        case "*":
            return $nbr1 * $nbr2;
        case "/":
            if ($nbr2 == 0){
                return "❌ Erreur : division par 0 interdite.";
            }
            return $nbr1 / $nbr2;
        default:
            return "❌ Erreur : signe introuvable.";
    }
}

// ---------------------
// Fonction multiplication
// ---------------------
function multiplication($nbr){
    echo "<h2>Table de multiplication de $nbr :</h2>";
    for ($i = 0; $i <= 10; $i++){
        echo "$nbr x $i = " . ($nbr * $i) . "<br>";
    }
}

// ---------------------
// Gestion du formulaire
// ---------------------
if (isset($_POST['nbr1'], $_POST['signe'], $_POST['nbr2'])) {
    $nbr1 = (int) $_POST['nbr1'];
    $nbr2 = (int) $_POST['nbr2'];
    $signe = trim($_POST['signe']);

    echo "<h2>Résultat :</h2>";
    echo calculer($nbr1, $signe, $nbr2);
}

if (isset($_GET['multiplication'])) {
    $nbr = (int) $_GET['multiplication'];
    multiplication($nbr);
}
?>
</body>
</html>
