<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once 'lib/Twig/Autoloader.php';
require_once 'classes/Image.class.php';
require_once 'classes/DB.class.php';
Twig_Autoloader::register();

  
try {
    
    $db = new DB('localhost','root', '', 'Photogallery');
    $db -> connection();
    $img = new Image();
    $data = $img -> show();
    
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');
    
    // инициализируем Twig
    $twig = new Twig_Environment($loader);
    $template = $twig ->loadTemplate('main.html');
    echo $template -> render(
      ['data' => $data]
    );
    
       
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}