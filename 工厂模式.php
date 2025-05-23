<?php 
class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function __toString() {
        return "{$this->name}:{$this->age}";
    }
}

class UserFactory {
    public static function create($name, $age) {
        return new User($name, $age);
    }
}

$user = UserFactory::create("Tom", 22);
echo $user; // 输出: Tom:22
