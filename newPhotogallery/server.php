<?php
require_once 'classes/Db.class.php';
require_once 'classes/Image.class.php';


    
    $db = new DB('localhost','root', '', 'Photogallery');
    $db -> connection();
    $img = new Image();
    $img ->  upload();


