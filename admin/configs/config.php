<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 12:40
 */
$container = new Pimple();

// databases

$container["db"]    = [
    "username"          => "roor",
    "password"          => "",
    "dbname"            => "panier",
    "host"              => "127.0.0.1",
    "port"              => 3306,
    "charset"           => "UTF8",
    "logger_class"      => "Logger",
    "log_dir"           => ADMIN_ROOT . DS . "db",
    "log_filename"      => "db.log",
    "connection_class"  => "Connexion",
    "db_class"          => "BD",
];

$container["db_logger"] = function($c){
    return new $c["logger_class"]($c["db"]["log_dir"], $c["log_filename"]);
};

$container["connection"] = function($c){
    return new $c["connection_class"]($c);
};

$container["db"] = function($c){
    return new $c["db_class"]($c["connection"], $c["db_logger"]);
};

// session
$container["session_opts"] = [
    "session_class"     => "Session",
    "flash_name"        => "flash",
    "csrf_salt"         => "WTodzfag9nuOXSyaisE6Ernlw8qx",
    "csrf_token_name"   => "_token_",
];

$container["session"] = function($c){
    return new $c["session_opts"]["session_class"]($c["session_opts"]);
};
