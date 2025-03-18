<?php
// 创建一个 User 数组，并使用 usort() 按照 age 降序排序。

class User{
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    public function toString(){
        return "{$this->name}:{$this->age}";
    }


}

$users = [
    new User("Alice", 25),
    new User("Bob", 30),
    new User("Charlie", 22)
];

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