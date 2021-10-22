<?php

namespace App\Fram;

class HTTPRequest
{
    public function cookieData($key)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public function cookieExists($key)
    {
        return isset($_COOKIE[$key]);
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function requestURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @param string|null $key
     * @return array|mixed
     */
    public function getQuery(string $key = null)
    {
        return $key ? $_GET[$key] : $_GET;
    }

    /**
     * @param string|null $key
     * @return array|mixed
     */
    public function getRequest(string $key = null)
    {
        return $key ? $_POST[$key] : $_POST;
    }
}