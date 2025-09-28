<?php
require_once './config.php';
$pdo = getPDO();

$action = $_GET['action'] ?? '';
$id = intval($_GET['id'] ?? 0);

// Valeurs par défaut pour le formulaire
$produit = ['titre' => '', 'description' => '', 'prix' => 0];

// Traitement des actions
switch ($action) {
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            // Mise à jour
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $prix = isset($_POST['prix']) ? floatval($_POST['prix']) : 0;

            if ($titre) {
                $stmt = $pdo->prepare("UPDATE produits SET titre=?, description=?, prix=? WHERE id=?");
                $stmt->execute([$titre, $description, $prix, $id]);
                // Redirection pour éviter le re-submission
                header('Location: index.php?page=produits');
                exit;
            }
        } else if ($id) {
            // Pré-remplissage formulaire
            $stmt = $pdo->prepare("SELECT * FROM produits WHERE id=?");
            $stmt->execute([$id]);
            $produit = $stmt->fetch() ?: $produit;
        }
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ajout
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $prix = isset($_POST['prix']) ? floatval($_POST['prix']) : 0;

            if ($titre) {
                $stmt = $pdo->prepare("INSERT INTO produits (titre, description, prix) VALUES (?, ?, ?)");
                $stmt->execute([$titre, $description, $prix]);
                // Redirection pour éviter le re-submission
                header('Location: index.php?page=produits');
                exit;
            }
        }
        break;

    case 'delete':
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM produits WHERE id=?");
            $stmt->execute([$id]);
            header('Location: index.php?page=produits');
            exit;
        }
        break;

    default:
        // aucune action spécifique
        break;
}

// Déterminer l'action du formulaire
$actionAttr = ($action === 'edit' && $id) ? "?page=produits&action=edit&id=$id" : "?page=produits&action=add";

// Formulaire Ajouter / Modifier
echo '<h2>' . ($action === 'edit' ? 'Modifier' : 'Ajouter') . ' produit</h2>';
echo '<form method="post" action="' . $actionAttr . '">';
echo 'Titre:<br><input name="titre" value="' . $produit['titre'] . '"><br>';
echo 'Description:<br><textarea name="description">' . $produit['description'] . '</textarea><br>';
echo 'Prix:<br><input type="number" step="0.01" name="prix" value="' . $produit['prix'] . '" min="0"><br>';
echo '<input type="submit" value="' . ($action === 'edit' ? 'Enregistrer' : 'Ajouter') . '">';
echo '</form>';

// Liste des produits
$stmt = $pdo->query("SELECT * FROM produits ORDER BY id DESC");
$rows = $stmt->fetchAll();

echo '<h2>Liste des produits</h2>';
echo '<table border=1 cellpadding=5>';
echo '<tr><th>ID</th><th>Titre</th><th>Description</th><th>Prix</th><th>Actions</th></tr>';

foreach ($rows as $r) {
    echo '<tr>';
    echo '<td>' . $r['id'] . '</td>';
    echo '<td>' . $r['titre'] . '</td>';
    echo '<td>' . $r['description'] . '</td>';
    echo '<td>' . $r['prix'] . '</td>';
    echo '<td>
            <a href="?page=produits&action=edit&id=' . $r['id'] . '">Modifier</a> | 
            <a href="?page=produits&action=delete&id=' . $r['id'] . '" onclick="return confirm(\'Supprimer ?\')">Supprimer</a>
          </td>';
    echo '</tr>';
}
echo '</table>';
