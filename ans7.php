<?php 
// 在 User 类中，实现 __toString() 方法，使 echo $user; 自动输出 "Tom:22" 格式。

class User{
    private $name;
    private $age;
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    public function __toString(){
        return "$this->name . $this->age"; //可是这就是string了吗， 也就是说我们只是简单调用了一下tostring这个方法对吗
    }
}




$user = new User("Tom", 22);
echo $user; // ✅ 自动调用 __toString()，输出：用户：Tom

// 你没有 显式调用 __toString()，但它在 echo 时 自动执行，这就是 魔术方法的“自动触发”特性！