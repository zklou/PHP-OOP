<?php
class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }

    public function __toString() {
        return "{$this->name}:{$this->age}";
    }
}

$users = [
    new User("Alice", 25),
    new User("Bob", 30),
    new User("Charlie", 22)
];

usort($users, function($a, $b) {
    return $b->getAge() - $a->getAge(); // 降序排序
});

foreach ($users as $user) {
    echo $user . "\n";
}
// 输出：Bob:30, Alice:25, Charlie:22
