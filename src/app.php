<?php
require_once __DIR__ . '/../vendor/autoload.php';
ini_set('date.timezone', 'Europe/Brussels');

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

$app = new Application();
$app['debug'] = true;
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/views'
));

if($app['debug']) {
    $app->register(new Whoops\Provider\Silex\WhoopsServiceProvider);
}

$app->get('/', function() use ($app) {
    return $app['twig']->render('index.html.twig');
});

return $app;
