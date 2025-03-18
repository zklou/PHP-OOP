<?php 
// 在 User 类中，age 属性应设为私有，用户不能直接访问，而必须通过 getAge() 方法获取。

class User{
    private $age;
    private $name;
    public function __construct($name, $age) {
        $this->age = $age;
        $this->name = $name;
    }
    public function getAge(){
        return $this->age;
    }

}


// 在 User 类中，age 属性应设为私有，用户不能直接访问，而必须通过 getAge() 方法获取。
$user = new User("Tom", 22);
echo $user->getAge(); // 正确
// echo $user->age; // 错误：无法直接访问私有属性