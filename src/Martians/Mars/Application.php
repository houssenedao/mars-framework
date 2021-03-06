<?php

namespace Martians\Mars;

use Martians\Container\Container;
use Martians\Routing\Router;

class Application
{
    /**
     * Mars framework version
     *
     * @var string
     */
    CONST VERSION = '1.0';


    private $container;


    public function __construct()
    {
        $this->container = new Container([
            'router' => function () {
                return new Router;
            }
        ]);
    }


    public function getContainer()
    {
        return $this->container;
    }


    public function get($uri, $handler)
    {
        $this->container->router->addRoute($uri, $handler);
    }


    public function run()
    {
        $router = $this->container->router;
        $router->setPath($_SERVER['PATH_INFO'] ?? '/');

        $response = $router->getResponse();
        return $this->process($response);
    }


    protected function process($callable)
    {
        return $callable();
    }
}