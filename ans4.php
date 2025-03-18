<?php 
// 创建一个 Shape 抽象类，定义 getArea() 方法。然后创建 Circle 和 Rectangle 类，它们必须实现 getArea() 方法。

abstract class shape{ //为什么使用abstract 并且我们不extend 这个function 也能运行 为什么要使用呢，这部分做什么用的
    abstract public function getArea();
}
class Circle extends shape{
    //圆的面积是pi() r 2
    private $r;
    public function __construct($r) {
        $this->r = $r;
    }
    public function getArea(){
        return pi() * $this->r * $this->r;
    }
}

$circle = new Circle(5);
echo "圆的面积: " . $circle->getArea(); // 输出: 78.5398

// **如果你想让所有子类都必须实现某个方法，并且提供默认实现的方法，**用 abstract class。
// abstract class 不能直接创建对象，它只是一个“模板”。

// 问：那是不是我的shape class 可以被一堆class所extend 所以我们使用 abstract
// 是的！因为 Shape（形状类）只是一个“模板”，可以被很多不同的类 extend，比如 Circle、Rectangle、Triangle 等。
// 如果 Shape 不是 abstract，那么： 你可以直接 new Shape()，但 Shape 本身没有具体形状，不应该被实例化！ 
// 子类可能忘记实现 getArea() 方法，导致错误！
