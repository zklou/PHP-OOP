<?php 
// 📌 题目说明：
// 创建 Employee 类，继承 User，并 增加 position（职位）属性。重写 getName() 方法，使其返回 "员工: {name}"。
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

class Employee extends User{
    private $position;

    public function __construct($name, $age, $position) {
        parent::__construct($name, $age); // below 
        $this->position = $position;
    }

    public function getname(){
        return "员工: " . parent::getName();
    }
}
$user = new Employee("Tom", 22, "manager");
echo $user->getname();


// 在 Employee 里，我们新增了 position 这个属性，但是 name 和 age 仍然是从 User 继承的，
// 所以 必须在 Employee 的 __construct() 里调用 parent::__construct() 来初始化 name 和 age，否则它们会是 null。

// 除了 parent:: 之外，还有 self::、static:: 和 ::（类名调用） 这几种使用 ::（范围解析运算符）的情况
// parent::sayHello(); // 调用父类的 sayHello()
// self::identify(); // 调用本类的 identify() 方法： 

class Animal {
    public static function identify() {
        echo "I am an Animal\n";
    }

    public static function whoAmI() {
        self::identify(); // 调用本类的 identify() 方法
    }
}

// static::identify(); // 动态绑定，调用的是最终类的方法
class Animal {
    public static function identify() {
        echo "I am an Animal\n";
    }

    public static function whoAmI() {
        static::identify(); // 动态绑定，调用的是最终类的方法
    }
}

// 这里的 MathHelper::square(5); 直接调用了 MathHelper 类中的 square() 方法，而不需要创建 new MathHelper() 实例。 
class MathHelper {
    public static function square($num) {
        return $num * $num;
    }
}

echo MathHelper::square(5); // 输出: 25
