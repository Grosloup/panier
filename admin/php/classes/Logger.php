<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 12:24
 */



class Logger {


    protected $file;
    protected $dateFormat = "d/m/Y H:i:s";

    public function __construct($dir_path = "", $filename = "")
    {
        $file =  $dir_path . "/" . $filename;
        if(!file_exists($file)){
            fclose(fopen($file, "x"));
            chmod($file, 0777);
        }
        $this->file = $file;
    }

    public function alert($message)
    {
        $this->write("alert", $message);
    }

    public function debug($message)
    {
        $this->write("debug", $message);
    }

    public function log($message)
    {
        $this->write("log", $message);
    }

    public function warn($message)
    {
        $this->write("warn", $message);
    }

    protected function write($type = "", $message)
    {
        $entete = "";
        switch($type){
            case "alert":
                $entete = "!!!! ALERT !!!! ";
                break;
            case "warn":
                $entete = "<<< WARN >>> ";
                break;
            case "debug":
                $entete = "??? DEBUG ??? ";
                break;
            case "log":
                $entete = "--- LOG --- ";
                break;

        }
        if(is_string($message)){
            $message = $entete . date($this->dateFormat) . " => " .$message . PHP_EOL;
        }
        if($message instanceof Exception){
            $e = $message;
            $message = $entete . date($this->dateFormat) . " => " .$e->getMessage() . PHP_EOL;
            $message .= $e->getTraceAsString() . PHP_EOL;
        }

        file_put_contents($this->file, $message, FILE_APPEND);
    }
}
