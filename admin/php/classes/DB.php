<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 13:51
 */

class DB {
    /**
     * @var Connexion
     */
    protected $con;
    /**
     * @var Logger
     */
    protected $logger;

    public function __construct(Connexion $con = null, Logger $logger = null)
    {
        $this->con = $con;
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function select()
    {

    }

    public function save()
    {

    }

    public function query($sql, $params=[])
    {

    }
}
