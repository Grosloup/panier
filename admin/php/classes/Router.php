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

    public function getRoute($routeName = "", $get=[], $default = "")
    {
        if(array_key_exists($routeName, $this->routes)){
            if($get){
                $getStr = "?";
                foreach($get as $k=>$v){
                    $getStr .= $k."=".urlencode($v)."&";
                }
                $getStr = rtrim($getStr, "&");
                return $this->routes[$routeName].htmlentities($getStr);
            }
            return $this->routes[$routeName];
        }
        return $default;
    }

    public function setRoutes($routes = [])
    {
        $this->routes = $routes;
    }
}
