<?php
ini_set('date.timezone', 'Europe/Brussels');
require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
require __DIR__.'/../config/config.php';
require __DIR__ . '/../src/app.php';

$app->run();
