<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once 'lib/Twig/Autoloader.php';
require_once 'classes/Image.class.php';
require_once 'classes/DB.class.php';
Twig_Autoloader::register();

  
try {
    
    $db = new DB('localhost','root', '', 'Photogallery');//создаем экземпляр класса DB
    $db->connection();// Подключаемся к базе
    $sql = "SELECT * From img";
    $res = $db ->sqlQuery($sql);//Выполняем запрос
    while ($data = mysqli_fetch_assoc($res))
    {
                  
        echo "<figure>
        <a href=\"photos.php?id={$data['Id']}\" target=\"_self\">
        <img src=\"{$data['smallPath']}\" alt=\"{$data['Name']}\" >
        </a>
     
        </figure>";
    }
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');
  
    // инициализируем Twig
    $twig = new Twig_Environment($loader);
    $template = $twig ->loadTemplate('main.html');
    echo $template -> render(array(
      'data' => $data  
    ));
    
       
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}