<?php
spl_autoload_register(function($class_name){
include "engine/".$class_name.".class.php";
});


$digit1 = new digital('Book',100,10);
$digit1->render();

$real = new Physical('Fruits', 50, 5);
$real->render();

$weight = new Weight('Vegetables', 25, 30);
$weight->render();
?>
<html lang="en">
        <head>
            <title>HW2</title>
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            
        </body>
</html>