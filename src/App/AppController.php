<?php

namespace App;

use Silex\Application;

class AppController {
    public function homeAction(Application $app) {
        return $app['twig']->render('index.html.twig');
    }
}
