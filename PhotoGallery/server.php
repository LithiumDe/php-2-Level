<?php
require_once 'lib/Twig/Autoloader.php';
require_once 'classes/DB.class.php';
require_once 'classes/Image.class.php';



if(!empty($_POST['photo'])){
    $db = new DB('localhost','root', '', 'Photogallery');
    $db -> connection();
    $img = new Image();
    $img -> upload();
    
}
 else {
    echo 'POST is empty';
}