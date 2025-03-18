<?php 
spl_autoload_register(function ($class) {
    include $class . '.php';
});

$user = new User("Tom", 22); // 自动加载 User.php 文件
echo $user;
