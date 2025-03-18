<?php 
class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function __clone() {
        $this->name = "Clone";
    }
}

$user1 = new User("Tom", 22);
$user2 = clone $user1;
echo $user2; // 输出: Clone:22
