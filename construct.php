<?php
class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function __destruct() {
        echo "{$this->name} 已被销毁\n";
    }
}

$user = new User("Tom", 22);
unset($user); // 手动销毁对象，输出 "Tom 已被销毁"
?>