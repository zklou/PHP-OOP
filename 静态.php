<?php
class Counter {
    private static $count = 0;

    public function __construct() {
        self::$count++;
    }

    public static function getCount() {
        return self::$count;
    }
}

new Counter();
new Counter();
echo Counter::getCount(); // 输出: 2
