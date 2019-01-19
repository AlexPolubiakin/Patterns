<?php
abstract class Product {
    abstract public function getTitle();
}

abstract class Provider {
    abstract public function createPhone($id);
    abstract public function createNotebook($id);
}

class LenovoPhone extends Product {
    public $title;
    public function __construct($id){
        echo "Я ",__CLASS__,"<br>";
        echo $id."<br>";
    }
    public function getTitle(){
        return $this->title . "<br>";
    }
    
}

class LenovoNotebook extends Product {
    public $title;
    public function __construct($id){
        echo "Я ",__CLASS__,"<br>";
        echo $id."<br>";
    }
    public function getTitle(){
        return $this->title . "<br>";
    }
    
}

class SamsungPhone extends Product{
    public $title;
    public function __construct($id){
        echo "Я",__CLASS__,"br";
        echo $id . "<br>";
    }
    public function getTitle(){
        return $this->title . "<br>";
    }
}

class SamsungNotebook extends Product{
    public $title;
    public function __construct($id){
        echo "Я",__CLASS__,"br";
        echo $id . "<br>";
    }
    public function getTitle(){
        return $this->title . "<br>";
    }
}

class LenovoProvider extends Provider {
    public function createPhone($id){
        return new LenovoPhone($id);
    }
    public function createNotebook($id){
        return new LenovoNotebook($id);
    }
    
}
class SamsungProvider extends Provider {
    public function createPhone($id){
        return new SamsungPhone($id);
    }
    public function createNotebook($id){
        return new SamsungNotebook($id);
    }
}

$fabric = new LenovoProvider();
$lenovoPhone = $fabric->createPhone(34);
$lenovoLaptop = $fabric->createNotebook(50);
$lenovoPhone->getTitle();
$lenovoLaptop->getTitle();

$samsung = new SamsungProvider();
$samsungPhone = $samsung->createPhone('J7');
$samsungLaptop = $samsung->createNotebook('AAA');