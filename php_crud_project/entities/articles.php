<?php
require_once './config.php';
$pdo = getPDO();

$action = $_GET['action'] ?? '';
$id = intval($_GET['id'] ?? 0);

// Valeurs par défaut pour le formulaire
$article = ['titre' => '', 'description' => '', 'date_creation' => '', 'auteur' => ''];

// Traitement du formulaire et des actions
switch ($action) {
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            // Mise à jour
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $date_creation = $_POST['date_creation'] ?? '';
            $auteur = $_POST['auteur'] ?? '';

            if ($titre) {
                $stmt = $pdo->prepare("UPDATE articles SET titre=?, description=?, date_creation=?, auteur=? WHERE id=?");
                $stmt->execute([$titre, $description, $date_creation, $auteur, $id]);
                header('Location: index.php?page=articles');
                exit;
            }
        } else if ($id) {
            // Pré-remplissage formulaire
            $stmt = $pdo->prepare("SELECT * FROM articles WHERE id=?");
            $stmt->execute([$id]);
            $article = $stmt->fetch() ?: $article;
        }
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ajout
            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $date_creation = $_POST['date_creation'] ?? '';
            $auteur = $_POST['auteur'] ?? '';

            if ($titre) {
                $stmt = $pdo->prepare("INSERT INTO articles (titre, description, date_creation, auteur) VALUES (?, ?, ?, ?)");
                $stmt->execute([$titre, $description, $date_creation, $auteur]);
                header('Location: index.php?page=articles');
                exit;
            }
        }
        break;

    case 'delete':
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM articles WHERE id=?");
            $stmt->execute([$id]);
            header('Location: index.php?page=articles');
            exit;
        }
        break;

    default:
        // Aucun traitement particulier
        break;
}

// Déterminer l'action du formulaire
$actionAttr = ($action === 'edit' && $id) ? "?page=articles&action=edit&id=$id" : "?page=articles&action=add";

// Formulaire Ajouter / Modifier
echo '<h2>' . ($action === 'edit' ? 'Modifier' : 'Ajouter') . ' article</h2>';
echo '<form method="post" action="' . $actionAttr . '">';
echo 'Titre:<br><input name="titre" value="' . htmlspecialchars($article['titre']) . '"><br>';
echo 'Description:<br><textarea name="description">' . htmlspecialchars($article['description']) . '</textarea><br>';
echo 'Date :<br><input type="date" name="date_creation" value="' . htmlspecialchars($article['date_creation']) . '"><br>';
echo 'Auteur:<br><input name="auteur" value="' . htmlspecialchars($article['auteur']) . '"><br>';
echo '<input type="submit" value="' . ($action === 'edit' ? 'Enregistrer' : 'Ajouter') . '">';
echo '</form>';

// Liste des articles
$stmt = $pdo->query("SELECT * FROM articles ORDER BY id DESC");
$rows = $stmt->fetchAll();

echo '<h2>Liste des articles</h2>';
echo '<table border=1 cellpadding=5>';
echo '<tr><th>ID</th><th>Titre</th><th>Description</th><th>Date</th><th>Auteur</th><th>Actions</th></tr>';

foreach ($rows as $r) {
    echo '<tr>';
    echo '<td>' . $r['id'] . '</td>';
    echo '<td>' . htmlspecialchars($r['titre']) . '</td>';
    echo '<td>' . htmlspecialchars($r['description']) . '</td>';
    echo '<td>' . htmlspecialchars($r['date_creation']) . '</td>';
    echo '<td>' . htmlspecialchars($r['auteur']) . '</td>';
    echo '<td>
            <a href="?page=articles&action=edit&id=' . $r['id'] . '">Modifier</a> | 
            <a href="?page=articles&action=delete&id=' . $r['id'] . '">Supprimer</a>
          </td>';
    echo '</tr>';
}
echo '</table>';
