<?php

class Preferences{
    private $data = [];
    private static $instance = null;
    private function __construct(){

    }

    public static function getInstance(){
        if(empty(self::$instance))
            self::$instance = new Preferences;
            return self::$instance;   
    }

    function getParam($param){
        return $this->data[$param];
    }

    function setParam($param,$value){
        $this->data[$param] = $value;
    }
 
}
echo "<h3>Одиночка</h3>";
$pref = Preferences::getInstance();

$pref->setParam("approot","this/is/approot");
$pref->setParam("urlroot","http://urlroot.url");
$pref->setParam("sitename","MySiteName");

$pref2 = Preferences::getInstance();

print_r($pref2->getParam("approot"));
echo "<br>";
print_r($pref2->getParam("urlroot"));
echo "<br>";
print_r($pref2->getParam("sitename"));
echo "<br>";



abstract class Vehicle {
    abstract public function ride();
}

abstract class VehicleConstructor {
    abstract public function createCar($model);
    abstract public function createBike($model);
}


class HondaVehicle extends VehicleConstructor {
    public function createCar($model){
        return new HondaCar($model);
    }
    public function createBike($model){
        return new HondaBike($model);
    }
}

class BmwVehicle extends VehicleConstructor {
    public function createCar($model){
        return new BmwCar($model);
    }
    public function createBike($model){
        return new BmwBike($model);
    }
}


class HondaBike extends Vehicle{
    public $model;
    public function __construct($model){
        $this->model = $model;
        echo "Создан " . __CLASS__ . " модель: " . $model . "<br>";
    }
    public function ride(){
        echo "Едем на " . __CLASS__ . " : " . $this->model . "<br>";
    }
}

class HondaCar extends Vehicle{
    public $model;
    public function __construct($model){
        $this->model = $model;
        echo "Создан " . __CLASS__ . " модель: " . $model . "<br>";
    }
    public function ride(){
        echo "Едем на " . __CLASS__ . " : " . $this->model . "<br>";
    }
}

class BmwBike extends Vehicle{
    public $model;
    public function __construct($model){
        $this->model = $model;
        echo "Создан " . __CLASS__ . " модель: " . $model . "<br>";
    }
    public function ride(){
        echo "Едем на " . __CLASS__ . " : " . $this->model . "<br>";
    }
}

class BmwCar extends Vehicle{
    public $model;
    public function __construct($model){
        $this->model = $model;
        echo "Создан " . __CLASS__ . " модель: " . $model . "<br>";
    }
    public function ride(){
        echo "Едем на " . __CLASS__ . " : " . $this->model . "<br>";
    }
}

echo "<h3>Абстрактная фабрика</h3>";
$honda = new HondaVehicle;
$bmw = new BmwVehicle;
$hondaBike = $honda->createBike('CTX700');
$hondaBike->ride();
$hondaCar = $honda->createCar('Accord');
$hondaCar->ride();
$bmwBike = $bmw->createBike('2018 K 1600 B');
$bmwBike->ride();
$bmwCar = $bmw->createCar('Z4');
$bmwCar->ride();







interface Page{
    public function createPage();
}

class HtmlPage implements Page{
    public function createPage(){
        echo "Я " . __CLASS__ . " страница<br>";
    }
}


abstract class PagesDecorator implements Page{
    protected $pages;
    public function __construct(Page $pages){
        $this->pages = $pages;
    }
    public function createPage(){
        $this->pages->createPage();
    }
}

class HtmlPageDecorator extends PagesDecorator{
    public function __construct(Page $pages){
        parent::__construct($pages);
    }
    private function videoPage(){
        echo "Я " . __CLASS__ . " страница с видео <br>";
    }
    public function createPage(){
        $this->pages->createPage();
        $this->videoPage();
    }
}
echo "<h3>Декоратор</h3>";
$videoPages = new HtmlPageDecorator(new HtmlPage);
$videoPages->createPage();