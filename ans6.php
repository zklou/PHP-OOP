<?php 
// 创建一个 Counter 类，每创建一个实例，static 变量 $count 自增，并提供 getCount() 方法获取当前实例总数。

class Counter{
    private static $count = 0;// 为什么要用static 不可以直接 private $count = 0 吗?

    public function __construct() {
        self::$count++; // 为什么不用$this->count = $count++;
    }
    public static function getCount(){ // 这里为什么要加static
        return self::$count++;
    }
}


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