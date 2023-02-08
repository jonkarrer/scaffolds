<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$dsn = "mysql:host={$_ENV["HOST"]};dbname={$_ENV["DATABASE"]}";
$options = array(
  PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/cert.pem",
);
$pdo = new PDO($dsn, $_ENV["USERNAME"], $_ENV["PASSWORD"], $options);

$sql = "CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id VARCHAR(255) NOT NULL UNIQUE,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE
)";


$pdo->query($sql);
