<?php

namespace App\Controller;

use App\Fram\HTTPRequest;
use App\Fram\HTTPResponse;

abstract class BaseController
{
    protected HTTPRequest $HTTPRequest;
    protected HTTPResponse $HTTPResponse;
    protected array $params;
    protected $template = __DIR__ . '/../../views/template.php';
    protected $viewsDir = __DIR__ . '/../../views/';

    public function __construct(string $action, array $params = [])
    {
        $this->HTTPRequest = new HTTPRequest();
        $this->HTTPResponse = new HTTPResponse();
        $this->params = $params;

        $method = 'execute' . ucfirst($action);
        if (!is_callable([$this, $method])) {
            throw new \RuntimeException('L\'action "' . $method . '" n\'est pas définie sur ce module');
        }
        $this->$method();
    }

    public function render(string $title, array $vars, string $view)
    {
        $view = $this->viewsDir . $view . '.view.php';
        foreach ($vars as $key => $value) {
            ${$key} = $value;
        }
        ob_start();
        require $view;
        $content = ob_get_clean();
        require $this->template;
        exit;
    }

    public function renderJSON($content)
    {
        $this->HTTPResponse->addHeader('Content-Type: application/json');
        echo json_encode($content, JSON_PRETTY_PRINT);
        exit;
    }
}