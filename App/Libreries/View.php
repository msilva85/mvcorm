<?php
namespace App\Libreries;
use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
  protected $templateEngine;

  public function __construct(){

    $loader = new Twig_Loader_Filesystem('../App/Views/');
    $this->templateEngine = new Twig_Environment($loader, [
                                'debug' => true,
                                'cache' => false
                            ]);
    //$this->templateEngine->addFilter();
  }

  public function render($fileView, array $variables = []){
    $ruta = "{$fileView}.html.twig";
    echo $this->templateEngine->render($ruta, $variables);
  }
}
