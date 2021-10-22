<?php

namespace App\Controller;

use Michelf\Markdown;

class PostController extends BaseController
{
    public function executeIndex()
    {
        $parsedText = Markdown::defaultTransform('``Bievenue ici !``');
        $this->render('coucou', ['text' => $parsedText],'Frontend/test');
    }
}