<?php
require_once 'lib/Twig/Autoloader.php';
require_once 'classes/Image.class.php';
require_once 'classes/DB.class.php';
Twig_Autoloader::register();

  
try {
    $img = new Image();
   
    $data = $img ->showSmall();
    
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');
    
    // инициализируем Twig
    $twig = new Twig_Environment($loader);
    $template = $twig ->loadTemplate('photos.html');
    echo $template -> render(
      ['data' => $data]
    );
    
       
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
