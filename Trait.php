<?php 
trait LoggerTrait {
    public function log($message) {
        echo "[LOG]: $message\n";
    }
}

class User {
    use LoggerTrait;
}

$user = new User();
$user->log("This is a log message."); // 输出: [LOG]: This is a log message.
