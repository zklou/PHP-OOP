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
}

class Employee extends User {
    private $position;

    public function __construct($name, $age, $position) {
        parent::__construct($name, $age);
        $this->position = $position;
    }

    public function getName() {
        return "员工: " . parent::getName();
    }
}

$emp = new Employee("Alice", 30, "Manager");
echo $emp->getName(); // 输出: 员工: Alice
?>