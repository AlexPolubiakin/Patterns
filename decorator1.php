<?php
interface Fruits{
    function getFruit();
}

class Apple implements Fruits{
    public function getFruit(){
        echo "this is apple";
    }
}

abstract class FruitsDecorator implements Fruits{
    protected $decoratedFruits;
    public function __construct(Fruits $decoratedFruits){
        $this->decoratedFruits = $decoratedFruits;
    }
    public function getFruit(){
        $this->decoratedFruits->getFruit();
    }
}

class ApplePropertiesDecorator extends FruitsDecorator{
    public function __construct(Fruits $decoratedFruits){
        parent::__construct($decoratedFruits);
    }
    private function redApple(){
        echo "<br> color: red";
    }
    public function getFruit(){
        $this->decoratedFruits->getFruit();
        $this->redApple();
    }
}


// $redApple->getFruit();

$test = new Apple;
$test->getFruit();

$redApple = new ApplePropertiesDecorator( new Apple );
$redApple->getFruit();