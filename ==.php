<?php 
class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$user1 = new User("Tom", 22);
$user2 = new User("Tom", 22);
$user3 = $user1;

var_dump($user1 == $user2);  // true (值相等)
var_dump($user1 === $user2); // false (不是同一对象)
var_dump($user1 === $user3); // true (引用相同)
