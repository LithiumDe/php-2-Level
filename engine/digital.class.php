<?php
class Digital extends Product{
 
    protected function getFullPrice(){
        $totalPrice = 0;
        return $totalPrice = $this->price*$this->count;
       
    }
    
    public function render() {
    echo "<div class='goods__item'>
                <div class='goods__title'>{$this->name}(Digital Product)</div>
                <div class='goods__count'>Sold: {$this->count} unit</div>
                <div class='goods__price'>Price: {$this->price} $/unit</div>
                <div class='goods__total-price'>Total: {$this->getFullPrice()} $.</div>
                <div class='goods__total-price'>Total: {$this->getProfit()} $.</div>

            </div>";
        
    }
  
}