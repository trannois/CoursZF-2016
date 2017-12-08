<?php
namespace UPJV\DbModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Charge une image du module
 * @package UPJV\DbModule\Controller
 */
class ImageController extends AbstractActionController
{

    public function loadAction()
    {
        $path = $this->params('path').'.png';
        $path = __DIR__.'/../../public/image/'.$path;
        $response = new \Zend\Http\Response();
        $hImgPng = new \Zend\Http\Header\ContentType('image/png');
        $response->getHeaders()->addHeader( $hImgPng );

        $fileImg = fopen($path, 'r');
        $data = fread($fileImg, filesize($path));
        fclose($fileImg);
        $response->setContent($data);
        return $response;
    }
}