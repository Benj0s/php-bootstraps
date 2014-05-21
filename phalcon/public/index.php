<?php

    try{

        // Load the config
        $config = new Phalcon\Config\Adapter\Ini(__DIR__ . '/../app/config/config.ini');

        // Register an autoloader
        $loader = new \Phalcon\Loader();
        $loader->registerDirs(array(
            __DIR__ . $config->application->controllersDir,
            __DIR__ . $config->application->modelsDir
        ))->register();

        // Create DI
        $di = new Phalcon\DI\FactoryDefault();

        // Setup view component
        $di->set('view', function() use ($config) {
            $view = new \Phalcon\Mvc\View();
            $view->setViewsDir(__DIR__ . $config->application->viewsDir);
            return $view;
        });

        // Setup a base URI so that all generated URIs include the "phalcon" folder
        $di->set('url', function() use ($config) {
            $url = new \Phalcon\Mvc\Url();
            $url->setBaseUri('/');
            return $url;
        });

        // Handle the request
        $application = new \Phalcon\Mvc\Application($di);

        echo $application->handle()->getContent();

    } catch(\Phalcon\Exception $e) {

        echo "PhalconException: ", $e->getMessage();

    }

?>
