<?php 
class Config {
    private $data = [];
    private static $instance = null;

    private function __construct(){

    }
    public static function getInstance(){
        if(empty(self::$instance))
            self::$instance = new Config;
        return self::$instance;
    }

    public function getParam($param){
        return $data[$param];
    }
    
    public function setParam($param,$value){
        $this->data[$param] = $value;
    }
}

$config = Config::getInstance();
$config->setParam("some",123);
$config2 = Config::getInstance();
print_r($config2->getParam("some"));