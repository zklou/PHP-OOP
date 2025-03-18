<?php 
// 创建 LoggerTrait，让 User 类 使用 log() 方法输出日志。


trait LoggerTrait
{
    public function log($message){
    echo"[LOG]: $message ";
    }
}

class User{
    use LoggerTrait;
}


$user = new User();
$user->log("This is a log message."); // 输出: [LOG]: This is a log message.


//记住这个写log的形式