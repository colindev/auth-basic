<?php

class AuthBasic
{
    private $rule = null;

    public function __construct($config)
    {
        if (is_array($config)) {
            $this->rule = function($username, $password) use($config) {

                return is_string($username) &&
                isset($config[$username]) &&
                password_verify($password, $config[$username]);
            };
        } elseif ($config instanceof Closure) {
            $this->rule = $config;
        }
    }

    public function isAuthorized()
    {
        if ($this->rule instanceof Closure &&
            isset($_SERVER['HTTP_AUTHORIZATION'])) {

            $authorization = preg_replace('/^Basic\s/', '', $_SERVER['HTTP_AUTHORIZATION']);
            $authorization = base64_decode($authorization);

            if (preg_match('/^(\w*):(\w*)$/', $authorization, $params)) {
                return true === call_user_func($this->rule, $params[1], $params[2]);
            }
        }

        return false;
    }

    public function challenge()
    {
        header('WWW-Authenticate: Basic');
        header('HTTP/1.1 401 Unauthorized');
        exit;
    }
}
