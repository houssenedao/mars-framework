<?php

namespace Martians\Routing;


class Router
{

    protected $routes = [];


    protected $path;


    public function setPath($path = '/')
    {
        $this->path = $path;
    }



    public function addRoute($uri, $handler)
    {
        $this->routes[$uri] = $handler;
    }



    public function getResponse()
    {
        return $this->routes[$this->path];
    }

}