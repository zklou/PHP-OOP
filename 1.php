<?php
class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
}

$user = new User("Tom", 22);
echo "姓名: " . $user->getName() . "\n"; // 输出: 姓名: Tom
echo "年龄: " . $user->getAge() . "\n"; // 输出: 年龄: 22
?>