<?php
class Product
{
    private $id;
    private $name;
    private $price;
    private $quantity;
    
    function __construct($id, $name, $price, $quantity)
    {
        $this->id= $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function view()
    {
        echo "<p>$this->id</p><p>$this->name</p><p>$this->price</p><p>$this->quantity</p>";
    }
}
$product = new Product(1,"Product", 1000, 100);
$product->view();
