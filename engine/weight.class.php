<?php


class Weight extends Product{
    
    protected function getFullPrice() {
        if($this->count>10){
            $discount =0.8;
        }
        elseif ($this->count>50) {
            $discount= 0.7;  
        }
        elseif ($this->count>100) {
        $discount = 0.5;
    
        }
        return $totalPreis = $this->price * $this->count * $discount;   
    }
  
    public function render() {
    echo "<div class='goods__item'>
                <div class='goods__title'>{$this->name}(Weight Product)</div>
                <div class='goods__count'>Sold: {$this->count} kg</div>
                <div class='goods__price'>Price: {$this->price} $/gkg</div>
                <div class='goods__total-price'>Total: {$this->getFullPrice()} $.</div>
                <div class='goods__price'>Price with profit: {$this->getProfit()} $/kg</div>
            </div>";
        
    }
  
}
