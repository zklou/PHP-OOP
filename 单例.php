<?php 
class Database {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}

$db1 = Database::getInstance();
$db2 = Database::getInstance();
var_dump($db1 === $db2); // 输出: true
