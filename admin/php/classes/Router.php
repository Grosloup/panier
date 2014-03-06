<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 06/03/14
 * Time: 13:48
 */

class Router {
    /**
     * @var array
     */
    protected $routes = [];

    function __construct($routes = [])
    {
        $this->routes = $routes;
    }

    public function getRoute($routeName = "", $default = "")
    {
        if(array_key_exists($routeName, $this->routes)){
            return $this->routes[$routeName];
        }
        return $default;
    }

    public function setRoutes($routes = [])
    {
        $this->routes = $routes;
    }
}
