<?php
require_once './config.php';
$pdo = getPDO();

// Récupérer le paramètre page
$page = $_GET['page'] ?? 'accueil';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        nav { background-color: #333; padding: 10px 20px; }
        nav a { color: #fff; text-decoration: none; margin-right: 15px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        main { padding: 20px; margin-bottom: 50px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 5px 10px; text-align: left; }
        footer { background: #333; color: #fff; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; margin: 0; }
    </style>
</head>
<body>
<nav>
    <a href="index.php?page=accueil">Accueil</a>
    <a href="index.php?page=users">Users</a>
    <a href="index.php?page=articles">Articles</a>
    <a href="index.php?page=produits">Produits</a>
</nav>

<main>
<?php
switch($page) {
    case 'users':
        include 'entities/users.php';
        break;
    case 'articles':
        include 'entities/articles.php';
        break;
    case 'produits':
        include 'entities/produits.php';
        break;
    case 'accueil':
        echo '<h1>Bienvenue sur la page d\'accueil</h1>
              <p>Utilisez le menu pour naviguer entre les sections.</p>';
        break;
    default:
        echo "<h2>Page non trouvée</h2>";
        break;
}
?>
</main>

<footer>
    &copy; <?= date('Y') ?> Mon Application PHP
</footer>

</body>
</html>
