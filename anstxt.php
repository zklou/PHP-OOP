<?php 
// 需要解释下这里面construct的作用，如果不加会怎么样

//需要在对象创建时初始化数据
//必须确保某些属性有值 ：$this->connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
//如果没有必须的初始数据，数据在查询后才负值就不需要加construct

// 是的，__destruct() 本质上是 PHP 提供的“析构 API” 但是它 并不是手动调用的，而是 PHP 在对象销毁时自动调用。


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


// **如果你想让所有子类都必须实现某个方法，并且提供默认实现的方法，**用 abstract class。
// abstract class 不能直接创建对象，它只是一个“模板”。

// 问：那是不是我的shape class 可以被一堆class所extend 所以我们使用 abstract
// 是的！因为 Shape（形状类）只是一个“模板”，可以被很多不同的类 extend，比如 Circle、Rectangle、Triangle 等。
// 如果 Shape 不是 abstract，那么： 你可以直接 new Shape()，但 Shape 本身没有具体形状，不应该被实例化！ 
// 子类可能忘记实现 getArea() 方法，导致错误！


$user = new User("Tom", 22);
echo $user->getAge(); // 正确
// echo $user->age; // 错误：无法直接访问私有属性

new Counter();
new Counter();
echo "当前对象数: " . Counter::getCount(); // 输出: 2

// 如果没有static的话 
// echo "对象数: " . $counter1->getCount(); // ❌ 输出: 1
// echo "对象数: " . $counter2->getCount(); // ❌ 输出: 1

// 如果你想让某个变量在所有对象之间共享，就用 static。
// 静态方法 (static function) 只能访问静态变量 (static $var)，不能访问非静态变量。
// static 适用于计数器、日志、数据库连接等场景！ 

// 大家一人一桶水 非static 就一桶的话就是static

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

usort($users, function($a,$b){ // usort 之类的 还有别的function 需要我了解的吗 
    return $b->getAge() - $a->getAge();
});

foreach($users as $user){
    echo $user->toString() ."\n";
} 
// foreach 是 PHP 最常用的遍历数组的方式，它用于循环访问数组或对象数组的每个元素。

// 分类	函数	用途
// 排序	usort()、sort()、asort()	排序数组
// 过滤	array_filter()	筛选符合条件的元素
// 映射	array_map()、array_walk()	处理数组元素
// 聚合	array_reduce()	计算数组的总和、合计
// 分割合并	array_chunk()、array_merge()	拆分/合并数组
// 去重	array_unique()	去掉重复值
// 集合操作	array_intersect()、array_diff()	找出相同/不同的数据

// foreach($array as $value) 适用于遍历普通数组。
// foreach($array as $key => $value) 适用于遍历关联数组。
// foreach($objects as $object) 适用于遍历对象数组，像 $user->toString() 这样使用。
// foreach 更简洁，推荐用于大多数数组遍历场景！ 

// 设计模式	        作用	                                    适用场景
// 单例模式	        确保一个类只有一个实例	                        数据库连接、日志管理、配置管理
// 工厂模式	        用一个工厂类来创建对象	                        避免 new 关键字，提高灵活性
// 观察者模式	    一旦某个对象发生变化，所有订阅它的对象都会收到通知	 事件系统（比如 Laravel 事件监听）
// 策略模式         在运行时动态切换不同的算法或逻辑	              支付方式（支付宝 / 微信 / 信用卡）