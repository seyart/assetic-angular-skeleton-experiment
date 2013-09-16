<?php

// Cache
$app['cache.path'] = __DIR__ . '/../cache';

// Assetic
$app['assetic.enabled'] = true;
$app['assetic.path_to_cache'] = $app['cache.path'] . '/assetic' ;
$app['assetic.path_to_web'] = __DIR__ . '/../web/app';
$app['assetic.input.path_to_assets'] = __DIR__ . '/../assets';

$app['assetic.input.path_to_css'] = array(
    $app['assetic.input.path_to_assets'] . '/scss/main.scss',
);
$app['assetic.output.path_to_css'] = 'css/styles.css';
/*
$app['assetic.input.path_to_js'] = array(
    __DIR__.'/../../vendor/twitter/bootstrap/js/bootstrap-tooltip.js',
    __DIR__.'/../../vendor/twitter/bootstrap/js/*.js',
    $app['assetic.input.path_to_assets'] . '/js/script.js',
);
$app['assetic.output.path_to_js'] = 'js/scripts.js';
*/
