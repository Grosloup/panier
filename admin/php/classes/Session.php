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
        if(!$this->exists("token_name")){
            $this->set("token_name", $this->configs["csrf_token_name"]);
        }

        $this->regenerate();
    }

    public function regenerate()
    {
        session_regenerate_id();
    }

    public function generateFormCsrfToken()
    {
        $token = md5(time() . uniqid());
        $sessionToken = md5($token . $this->configs["csrf_salt"]);

        $this->set($this->get("token_name"), $sessionToken);
        return $token;
    }

    public function validateFormCsrfToken($token = "")
    {
        $left = md5($token . $this->configs["csrf_salt"]);
        $right = $this->get($this->configs["csrf_token_name"], true);
        return $left === $right;
    }

    public function getTokenName()
    {
        return $this->get("token_name");
    }

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

    public function delete($key)
    {
        if($this->exists($key)){
            unset($_SESSION[$key]);
        }
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
