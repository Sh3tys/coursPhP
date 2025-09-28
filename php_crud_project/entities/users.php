<?php
require_once './config.php';
$pdo = getPDO();

$action = $_GET['action'] ?? '';
$id = intval($_GET['id'] ?? 0);

$user = [
    'prenom' => '',
    'nom' => '',
    'email' => '',
    'telephone' => '',
    'ville' => '',
    'code_postal' => ''
];

switch ($action) {
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
            $prenom = $_POST['prenom'] ?? '';
            $nom = $_POST['nom'] ?? '';
            $email = $_POST['email'] ?? '';
            $telephone = isset($_POST['telephone']) ? preg_replace('/\D+/', '', $_POST['telephone']) : '';
            $ville = $_POST['ville'] ?? '';
            $code_postal = $_POST['code_postal'] ?? '';

            if ($prenom && $nom) {
                $stmt = $pdo->prepare("UPDATE users SET prenom=?, nom=?, email=?, telephone=?, ville=?, code_postal=? WHERE id=?");
                $stmt->execute([$prenom, $nom, $email, $telephone, $ville, $code_postal, $id]);
                header('Location: index.php?page=users');
                exit;
            }
        } else if ($id) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
            $stmt->execute([$id]);
            $user = $stmt->fetch() ?: $user;
        }
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenom = $_POST['prenom'] ?? '';
            $nom = $_POST['nom'] ?? '';
            $email = $_POST['email'] ?? '';
            $telephone = isset($_POST['telephone']) ? preg_replace('/\D+/', '', $_POST['telephone']) : '';
            $ville = $_POST['ville'] ?? '';
            $code_postal = $_POST['code_postal'] ?? '';

            if ($prenom && $nom) {
                $stmt = $pdo->prepare("INSERT INTO users (prenom, nom, email, telephone, ville, code_postal) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$prenom, $nom, $email, $telephone, $ville, $code_postal]);
                header('Location: index.php?page=users');
                exit;
            }
        }
        break;

    case 'delete':
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
            $stmt->execute([$id]);
            header('Location: index.php?page=users');
            exit;
        }
        break;

    default:
        break;
}

$actionAttr = ($action === 'edit' && $id) ? "?page=users&action=edit&id=$id" : "?page=users&action=add";

echo '<h2>' . ($action === 'edit' ? 'Modifier' : 'Ajouter') . ' utilisateur</h2>';
echo '<form method="post" action="' . $actionAttr . '">';
echo 'Prénom:<br><input name="prenom" value="' . $user['prenom'] . '"><br>';
echo 'Nom:<br><input name="nom" value="' . $user['nom'] . '"><br>';
echo 'Email:<br><input name="email" value="' . $user['email'] . '"><br>';
echo 'Téléphone:<br><input name="telephone" value="' . $user['telephone'] . '"><br>';
echo 'Ville:<br><input name="ville" value="' . $user['ville'] . '"><br>';
echo 'Code postal:<br><input name="code_postal" value="' . $user['code_postal'] . '"><br>';
echo '<input type="submit" value="' . ($action === 'edit' ? 'Enregistrer' : 'Ajouter') . '">';
echo '</form>';

$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
$rows = $stmt->fetchAll();

echo '<h2>Liste des utilisateurs</h2>';
echo '<table border=1 cellpadding=5>';
echo '<tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Email</th><th>Téléphone</th><th>Ville</th><th>CP</th><th>Actions</th></tr>';

foreach ($rows as $r) {
    echo '<tr>';
    echo '<td>' . $r['id'] . '</td>';
    echo '<td>' . $r['prenom'] . '</td>';
    echo '<td>' . $r['nom'] . '</td>';
    echo '<td>' . $r['email'] . '</td>';
    echo '<td>' . $r['telephone'] . '</td>';
    echo '<td>' . $r['ville'] . '</td>';
    echo '<td>' . $r['code_postal'] . '</td>';
    echo '<td>
            <a href="?page=users&action=edit&id=' . $r['id'] . '">Modifier</a> | 
            <a href="?page=users&action=delete&id=' . $r['id'] . '" onclick="return confirm(\'Supprimer ?\')">Supprimer</a>
          </td>';
    echo '</tr>';
}
echo '</table>';
