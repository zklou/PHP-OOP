<?php
abstract class Shape {
    abstract public function getArea();
}

class Circle extends Shape {
    private $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function getArea() {
        return pi() * pow($this->radius, 2);
    }
}

$circle = new Circle(5);
echo "圆的面积: " . $circle->getArea(); // 输出: 78.5398
?>
