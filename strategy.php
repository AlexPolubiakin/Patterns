<?php

abstract class Product {
    public $title;
    public $price;
    private $render;
    abstract public function get();
}

abstract class Render {
    abstract public function get($obj);
}

class Phone extends Product{
    public $title;
    public $price;
    private $render;
    public function __construct($t,$p,$r){
        $this->title = $t;
        $this->price = $p;
        $this->render = $r;
    }
    public function get(){
        $this->render->get($this);
    }
}

class HTMLRender extends Render{
    protected $txt;
    public function get($obj){
        $this->txt = "<div class=\"product\">\n";
        foreach($obj as $k=>$v)
            $this->txt .= "\t<div class=\"$k\">$v</div>\n";
            $this->txt .= "</div>\n";
            echo $this->txt;
    }
}

$phone = new Phone("Телефон",1e4, new HTMLRender );
echo $phone->get();