<?php

namespace App\Controller;

use App\Fram\BaseClasses\BaseController;
use App\Fram\Utils\DIC;
use App\Manager\ImageManager;
use App\Manager\PostManager;
use Firebase\JWT\JWT;
use Michelf\Markdown;

class PostController extends BaseController
{
    public function getIndex()
    {
        $postMmanager = DIC::autowire('PostManager');
        /** @var $postMmanager PostManager */

        $imageManager = DIC::autowire('ImageManager');
        /** @var $imageManager ImageManager */

        $key = bin2hex(random_bytes(20));
        $payload = [
            'user_name' => 'john doe',
            'exp' => time() + 120
        ];
        $token = JWT::encode($payload, $key);
        $decoded = JWT::decode($token, $key, array('HS256'));
        $parsedText = Markdown::defaultTransform('``Bievenue ici !``');

        $this->render(
            'Hello World !',
            [
                'text' => $parsedText,
                'token' => $decoded,
                'databases' => $postMmanager->showDatabases(),
                'allImages' => $imageManager->getAllImages()
            ],
            'Frontend/home'
        );
    }
}