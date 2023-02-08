<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$app = AppFactory::create();
$app->addBodyParsingMiddleware();

// Register routes
$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();
