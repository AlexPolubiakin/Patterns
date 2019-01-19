<?php


/**
 * 
 * 
 * 
 * 
 * BUILDER PATTERN
 */
class Window {
    private $visible = false;
    private $modal = false;
    private $dialog = false;

    function __constructor($d , $m , $v){
        $this->visible = $v;
        $this->modal = $m;
        $this->dialog = $d;
    }

}

class CreateWindow{
    function setDialog($flag = false){
        $this->dialog = $flag;
        return $this;
    }
    function setModal($flag = false){
        $this->modal = $flag;
        return $this;
    }
    function setVisible($flag = false){
        $this->visible = $flag;
        return $this;
    }
    function create(){
        return new Window($this->dialog,$this->modal,$this->visible);
    }
}

$x = new CreateWindow;
$w = $x->setVisible(true)->setModal(true)->create();

/**
 * SINGLETON PATTERN
 */

