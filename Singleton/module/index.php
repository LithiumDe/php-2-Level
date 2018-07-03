<?php

namespace module;
use module\traits\TraitsClass;
require_once 'traits/TraitsClass.php';

$obj1 = TraitsClass::get_instance();
echo $obj1->newFunc()."<br>";

$obj2 = TraitsClass::get_instance();
echo $obj2->myFunc()."<br>";

$obj3 = TraitsClass::get_instance();
echo $obj3->myFunc()."<br>";