<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 12:47
 */



class Connexion {
    /**
     * @var PDO
     */
    protected $pdo = null;
    /**
     * @var Pimple
     */
    protected $container;
    /**
     * @var bool
     */
    protected $isConnected = false;

    protected $defaultPort = 3306;

    protected $defaultCharset = "UTF8";

    public function __construct(Pimple $container)
    {
        $this->container = $container;
    }

    public function connect()
    {
        if($this->isConnected === true){
            return false;
        }
        $dsn = "";

        try{
            $port = isset($this->container["db"]["port"]) ? $this->container["db"]["port"] : $this->defaultPort;
            $charset = isset($this->container["db"]["charset"]) ? $this->container["db"]["charset"] : $this->defaultCharset;

            $dsn = "mysql:host=" . $this->container["db"]["host"] . ";dbname=" . $this->container["db"]["dbname"] . ";port=" . $port . ";charset=" . $charset;
        } catch (RuntimeException $r) {
            $this->container["db_logger"]->debug($r);
        }

        try{
            $this->pdo = new PDO($dsn, $this->container["db"]["dbname"], $this->container["db"]["dbname"]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->isConnected = true;
        } catch(RuntimeException $r) {
            if($r instanceof PDOException){
                $this->container["db_logger"]->alert($r);
            } else {
                $this->container["db_logger"]->debug($r);
            }
        }

    }
}
