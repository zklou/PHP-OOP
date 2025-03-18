<?php
// 在 User 类中，实现 __clone() 方法，使 name 属性在克隆对象时自动修改为 "Clone"。

class User{
    private $name;
    private $age;
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
    public function __clone(){ //这个function 存在的意义是什么
        $this->name="Clone"; //为什么打印个clone出来，是在这一块修改clone后的值吗
    }
    public function __toString() {
        return "{$this->name}:{$this->age}";
    }

}


$user1 = new User("Tom", 22);
$user2 = clone $user1;

echo $user1 . "\n"; // 输出: Tom:22
echo $user2 . "\n"; // 输出: Clone:22


// 浅拷贝与深拷贝，以及适用场景

//浅拷贝就像“复印身份证”，虽然你手上有两张相同的身份证（对象），但它们指向的是同一个人（引用地址）。
class User {
    public $name;
    public $data; // 复杂属性（数组）

    public function __construct($name) {
        $this->name = $name;
        $this->data = ["role" => "User"];
    }
}

$user1 = new User("Tom");
$user2 = clone $user1; // ✅ 浅拷贝

$user2->data["role"] = "Admin"; // 修改 $user2->data

print_r($user1->data); // ❌ $user1 也被修改了！


// 深拷贝就像“创建双胞胎”，他们虽然长得一模一样（值相同），但每个人有自己独立的记忆（不同的引用地址）。
class User {
    public $name;
    public $data;

    public function __construct($name) {
        $this->name = $name;
        $this->data = ["role" => "User"];
    }

    public function __clone() {
        $this->data = array_merge([], $this->data); // ✅ 创建新数组，避免共享引用
    }
}

$user1 = new User("Tom");
$user2 = clone $user1; // ✅ 深拷贝

$user2->data["role"] = "Admin"; // 只修改 $user2->data

print_r($user1->data); // ✅ $user1 仍然是 "User"，不会受影响

