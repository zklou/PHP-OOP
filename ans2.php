<?php 

// 在 User 类中，添加一个析构方法 __destruct()，当对象被销毁时，自动输出 "对象 {name} 已被销毁"。测试对象销毁时的行为。

class users{ //创建user实例
    private $name;

    //我们这里必须先构建再destuct吗 可以直接如下写个getname吗 不可以 因为没给name负值 
    //如果不可以 我们构建函数的意义是什么
    public function getname(){
        return $this->name;
    }
    public function __destruct(){
        echo "{$this->name} destruct";
    }

}
$user = new users("Tom");


// 是的，__destruct() 本质上是 PHP 提供的“析构 API” 但是它 并不是手动调用的，而是 PHP 在对象销毁时自动调用。