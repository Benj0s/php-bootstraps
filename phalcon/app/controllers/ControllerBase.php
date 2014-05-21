<?php

class ControllerBase extends \Phalcon\Mvc\Controller {

    protected function initialize() {

        Phalcon\Tag::prependTitle(__DIR__ . $config->application->controllersDir);

    }

    protected function forward($uri) {
        $uriParts = explode('/', $uri);
        return $this->dispatcher->foward(
            array(
                'controller' => $uriParts[0],
                'action' => $uriParts[1]
            )
        );
    }

}
