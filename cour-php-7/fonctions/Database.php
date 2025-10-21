<?php
namespace App\Db;
use PDO;

$host = "localhost";
$db = 'repertoire';
$user = "shetys";
$pwd = "shetys123";
$charset= 'utf8';

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

class Database{
  private PDO $pdo;
  private $host;
  private $db;
  private $user;
  private $pwd;
  private $charset;
  private $options;

  public function __construct($host, $db, $user, $pwd, $charset, $options){
    $this->host = $host;
    $this->db = $db;
    $this->user = $user;
    $this->pwd = $pwd;
    $this->charset = $charset;
    $this->options = $options;

    $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset, $this->user, $this->pwd, $this->options);
  }

  public function getPdo(){
    return $this->pdo;
  }
}