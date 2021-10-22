<?php

namespace App\Controller;

use Michelf\Markdown;

class PostController extends BaseController
{
    public function executeIndex()
    {
        $parsedText = Markdown::defaultTransform('``Bievenue ici !``');
        $this->render('Hello World !', ['text' => $parsedText],'Frontend/home');
    }
}