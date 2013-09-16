<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use SilexAssetic\AsseticServiceProvider;


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

if (isset($app['assetic.enabled']) && $app['assetic.enabled']) {
    $app->register(new AsseticServiceProvider(), array(
        'assetic.options' => array(
            'debug' => $app['debug'],
            'auto_dump_assets' => $app['debug'],
        )
    ));

    $app['assetic.filter_manager'] = $app->share(
        $app->extend('assetic.filter_manager', function($fm, $app) {
            $fm->set('scssphp', new Assetic\Filter\ScssphpFilter());

            return $fm;
        })
    );

    $app['assetic.asset_manager'] = $app->share(
        $app->extend('assetic.asset_manager', function($am, $app) {
            $am->set('styles', new Assetic\Asset\AssetCache(
                new Assetic\Asset\GlobAsset(
                    $app['assetic.input.path_to_css'],
                    array(
                        $app['assetic.filter_manager']->get('scssphp')
                    )
                ),
                new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
            ));
            $am->get('styles')->setTargetPath($app['assetic.output.path_to_css']);
/*
            $am->set('scripts', new Assetic\Asset\AssetCache(
                new Assetic\Asset\GlobAsset($app['assetic.input.path_to_js']),
                new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
            ));
            $am->get('scripts')->setTargetPath($app['assetic.output.path_to_js']);
*/
            return $am;
        })
    );
}

return $app;
