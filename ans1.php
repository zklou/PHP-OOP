// 1. 类与对象（基础）
// 📌 题目说明：
// 创建一个 PHP 类 User，包含 2 个私有属性 $name 和 $age，并提供 getName() 和 getAge() 
// 方法来获取它们的值。创建对象并打印姓名和年龄。

<?php
    class users{
        private $name;
        private $age;
        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }
        public function getname(){
            return $this->name;
        }
        public function getage(){
            return $this->age;
        }
    }

    $user = new users("tom",22);
    echo "name".$user->getname();
    echo "age".$user->getage();


    // 需要解释下这里面construct的作用，如果不加会怎么样

    //需要在对象创建时初始化数据
    //必须确保某些属性有值 ：$this->connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
    //如果没有必须的初始数据，数据在查询后才负值就不需要加construct