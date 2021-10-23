<?php

namespace App\Controller;

use App\Fram\BaseClasses\BaseController;
use App\Fram\Utils\UploadUtils;

class ApiController extends BaseController
{
    public function executeUploadImage()
    {
        $image = UploadUtils::uploadImage('image');
        $this->render(
            'Votre Image',
            [
                'image' => UploadUtils::UPLOADED_PUBLIC_IMAGES . $image
            ],
            'Frontend/image'
        );
    }
}