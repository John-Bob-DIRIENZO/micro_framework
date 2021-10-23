<?php

namespace App\Controller;

use App\Fram\BaseClasses\BaseController;
use App\Fram\Utils\DIC;
use App\Manager\PostManager;
use Firebase\JWT\JWT;
use Michelf\Markdown;

class PostController extends BaseController
{
    public function executeIndex()
    {
        $manager = DIC::autowire('PostManager');
        /** @var $manager PostManager */
        var_dump($manager->showDatabases());

        $key = bin2hex(random_bytes(20));
        $payload = [
            'user_name' => 'john doe',
            'exp' => time() + 120
        ];
        $token = JWT::encode($payload, $key);
        $decoded = JWT::decode($token, $key, array('HS256'));
        $parsedText = Markdown::defaultTransform('``Bievenue ici !``');
        $this->render('Hello World !', ['text' => $parsedText, 'token' => $decoded], 'Frontend/home');
    }
}