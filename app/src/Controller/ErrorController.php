<?php

namespace App\Controller;

class ErrorController extends BaseController
{
    /**
     * Returns 404 Error code with the 404 view
     * @return mixed
     */
    public function executeNoRoute()
    {
        $this->HTTPResponse->addHeader('HTTP/1.1 404 Not Found');
        $this->render("Error 404", [], "Error/404");
    }

    public function executeNoRouteJSON()
    {
        $this->HTTPResponse->addHeader('HTTP/1.1 404 Not Found');
        $this->renderJSON([
            'status' => 0,
            'error' => 'Nothing found at this address'
        ]);
    }
}