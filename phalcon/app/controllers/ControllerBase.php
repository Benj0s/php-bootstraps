<?php

class ControllerBase extends \Phalcon\Mvc\Controller {

    protected function initialize() {

        $config = new Phalcon\Config\Adapter\Ini(__DIR__ . '/../../app/config/config.ini');
        Phalcon\Tag::prependTitle($config->site->title);
        $this->view->setVar('heading', $config->site->headline);
        $this->view->setVar('subHeading', $config->site->subHeadline);

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
