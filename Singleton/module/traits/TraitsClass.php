
        <?php
        namespace module\traits;
        require_once 'Singleton.php';
        class TraitsClass {
            public $count = 1;
            use Singleton;
            public function newFunc(){
                return $this->count++;
            }
        }
