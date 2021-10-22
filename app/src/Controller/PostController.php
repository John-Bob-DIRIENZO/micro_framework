<?php

namespace App\Controller;

class PostController extends BaseController
{
    public function executeIndex()
    {
        $this->render('coucou', ['text' => 'Francis Huster'],'Frontend/test');
    }
}