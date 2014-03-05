<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 14:12
 */

class Session {
    protected $configs = [];

    public function __construct($configs = [])
    {
        $this->configs = $configs;
    }

    public function start($savePath = "")
    {
        if($savePath != ""){
            session_save_path($savePath);
        }
        $params = session_get_cookie_params();
        session_set_cookie_params(
            $params['lifetime'], $params['path'], $params['domain'], $params['secure'], true
        );
        session_start();

        $this->regenerate();
    }

    public function regenerate()
    {
        session_regenerate_id();
    }

/*    public static function generateFormCsrfToken()
    {
        $token = md5(time() . uniqid());
        $sessionToken = md5($token . self::$configs["security"]["csrf"]["salt"]);
        self::set("token_name", self::$configs["security"]["csrf"]["token_name"]);
        self::set(self::$configs["security"]["csrf"]["token_name"], $sessionToken);
        return $token;
    }

    public static function validateFormCsrfToken($token = "")
    {
        $left = md5($token . self::$configs["security"]["csrf"]["salt"]);
        $right = self::get(self::$configs["security"]["csrf"]["token_name"], true);
        return $left === $right;
    }*/

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $destroy=false)
    {
        $value = null;
        if($this->exists($key)){
            $value = $_SESSION[$key];
            if($destroy){
                unset($_SESSION[$key]);
            }
        }
        return $value;
    }

    public function setFlashMessage($message = "")
    {
        $this->set($this->configs["flash_name"], $message);
    }

    public function getFlashMessage()
    {
        return $message = $this->get($this->configs["flash_name"], true);
    }

    public function exists($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    public function clear()
    {
        $_SESSION = [];
        $this->regenerate();
    }

    public function destroy()
    {
        $this->clear();
        if(ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(session_name(), time() - 8600, $params['path'], $params['domain'], $params['secure'], $params['httponly'] );
        }
        session_destroy();
    }
}
