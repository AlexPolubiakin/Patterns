<?
interface Shape {
    function draw();
}

class Squre implements Shape{
    function draw(){
        echo __METHOD__;
    }
};

class Squre implements Shape{
    function draw(){
        echo __METHOD__;
    }
};

class Rectangle implements Shape{
    function draw(){
        echo __METHOD__;
    }
};
class Circle implements Shape{
    function draw(){
        echo __METHOD__;
    }
};

class ShapeFactory{
    function getShape($type){
        $type = strtoupper($type);
        if(!$type) return null;
        switch($type){
            case 'SQUARE': return new Square; break;
            case 'RECTANGLE': return new Rectangle; break;
            case 'CIRCLE': return new Circle; break;
            default: throw new Exception('Wrong type!');
        }
    }
}
$factory = new ShapeFactory;
$r = $factory->getShape('rectangle');
$c = $factory->getShape('circle');
$r->draw(); $c->draw();