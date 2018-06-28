<?php

class Product
{
    public $id;
    public $name;
    public $price;
  //Конструктор класса Product
    function __construct($id, $name,$price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
     
    }
    function view(){
        echo "<p>$this->id</p><p>$this->name</p><p>$this->price</p>";

    }
    
}

class Phone extends Product{
    public $description;    
    public $quantity;
    //Переопределяем конструктор
    function __construct($id, $name, $price, $description, $quantity) {
        parent::__construct($id, $name, $price);
        $this->description = $description;
        $this->quantity = $quantity;
    }
            function view() {
        echo "<p>$this->id</p><p>$this->name</p><p>$this->price</p><p>$this->description</p><p>$this->quantity</p>";
    }
}
$apple = new Phone(1, 'iPhone', 1200, 'Mobile Phone', 10);
$apple->view();

//Задание №5

/*
class A {
public function foo () {
static $x = 0;
echo ++ $x;
}
}
$a1 = new A (); создается объект а1
$a2 = new A (); создается объект а2
$a1 -> foo ();вызывается метод объекта a1, в котором префиксный инкремент увеличивет
статическую переменную на единицу и затем возвращает значение $x1 = 1.
$a2 -> foo (); так как переменная статическая, то она принадлежит не объекту, а классу, поэтому 
переменная x уже будет равна 1, и плюс инкремент, то результат будет 2.
$a1 -> foo ();по аналогии выше, переменная x = 2 и плюс инкремент, выведется 3.
$a2 -> foo ();переменная x = 3 и плюс инкремент, выведется 4
*/
//Задание №6
/*
class A {
public function foo () {
static $x = 0;
echo ++ $x;
}
}
 Класс B наследник класса А
class B extends A {
}
$a1 = new A (); создаем экземпляр класса А.
$b1 = new B (); создаем экземпляр класса В.
$a1 -> foo (); выведет 1.
$b1 -> foo (); выведет 1, так как статическая переменная принадлежит классу В.
$a1 -> foo ();выведет 2, так как $x уже равен 1.
$b1 -> foo ();выведет 2, так как $x уже равен 1.
 */
//Задание №7

 class W {
public function foo () {
static $x = 0;
echo ++ $x;
}
}
class X extends W {
}
$a1 = new W;
$b1 = new X;
$a1 -> foo ();
$b1 -> foo ();
$a1 -> foo ();
$b1 -> foo ();
 