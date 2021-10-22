<?php

namespace App\Fram;

use App\Controller\ErrorController;

class Router
{
    private $HTTPRequest;

    public function __construct()
    {
        $this->HTTPRequest = new HTTPRequest();
    }

    public function getController()
    {
        $xml = new \DOMDocument();
        $xml->load(__DIR__ . '/../../config/routes.xml');
        $routes = $xml->getElementsByTagName('route');

        $requestPath = $this->HTTPRequest->getQuery('p');

        isset($requestPath) ? $path = htmlspecialchars($requestPath) : $path = "/";

        foreach ($routes as $route) {
            if ($path === $route->getAttribute('p')) {
                $controllerClass = 'App\\Controller\\' . $route->getAttribute('controller');
                $action = $route->getAttribute('action');
                $params = [];
                if ($route->hasAttribute('params')) {
                    $keys = explode(',', $route->getAttribute('params'));
                    foreach ($keys as $key) {
                        $params[$key] = $_GET[$key];
                    }
                }
                return new $controllerClass($action, $params);
            }
        }

        return new ErrorController('noRoute');
    }
}