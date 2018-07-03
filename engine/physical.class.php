<?php


class Physical extends Digital{
    
        
    protected function getFullPrice(){
        
        return $totalPrice = $this->count * $this->price;//Цена без прибыли
        
    }
    

    public function render() {
    echo "<div class='goods__item'>
                <div class='goods__title'>{$this->name}(Physical Product)</div>
                <div class='goods__count'>Sold: {$this->count} unit</div>
                <div class='goods__price'>Price: {$this->price} $/unit</div>
                <div class='goods__total-price'>Total: {$this->getFullPrice()} $.</div>
                <div class='goods__price'>Price with profit: {$this->getProfit()} $/unit</div>
            </div>";
        
    }
  
    
 
}
