<?php

namespace App\Controller;

use App\Fram\BaseClasses\BaseController;

class ErrorController extends BaseController
{
    /**
     * Returns 404 Error code with the 404 view
     */
    public function getNoRoute(): void
    {
        $this->HTTPResponse->addHeader('HTTP/1.1 404 Not Found');
        $this->render("Error 404", [], "Error/404");
    }

    /**
     * Returns 404 Error code with a JSON message
     */
    public function getNoRouteJSON(): void
    {
        $this->HTTPResponse->addHeader('HTTP/1.1 404 Not Found');
        $this->renderJSON([
            'status' => 0,
            'error' => 'Nothing found at this address'
        ]);
    }
}