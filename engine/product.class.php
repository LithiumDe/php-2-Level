<?php

abstract class Product{
    protected $name;
    protected $price;
    protected $count;
    const PROFIT = 20;//Прибыль от стоимости 20%
    
    public function __construct($name, $price, $count) {
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }
    protected function getProfit(){
        return $this->getFullPrice()+($this->getFullPrice()*Product::PROFIT/100);
    }
    
    abstract protected function getFullPrice();
    abstract protected function render();
    
}


