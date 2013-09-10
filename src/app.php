<?php
require_once __DIR__ . '/../vendor/autoload.php';
ini_set('date.timezone', 'Europe/Brussels');

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;

$app = new Application();
$app['debug'] = true;
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/views'
));

if($app['debug']) {
    $app->register(new Whoops\Provider\Silex\WhoopsServiceProvider);
}

$app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
    $loader = new YamlFileLoader(new FileLocator(__DIR__ . '/../config'));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);

    return $routes;
});

return $app;
