<?php
$DB_HOST = '127.0.0.1';
$DB_NAME = 'phpProce';
$DB_USER = 'shetys';
$DB_PASS = 'shetys123';

function getPDO() {
    global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS;
    try {
        $pdo = new PDO(
            "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8",
            $DB_USER,
            $DB_PASS,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        return $pdo;
    } catch (PDOException $e) {
        die('DB Connection failed: ' . $e->getMessage());
    }
}
?>
