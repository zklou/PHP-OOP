<?php
// 保证 PHP 定时任务的可靠性？
// 场景： 你需要定期执行任务（如清理过期数据），但任务可能会被意外中断或重复执行，如何保证任务可靠性？
/*
Crontab 配置
* * * * * php /path/to/script.php

使用 Redis 分布式锁
$lock = $redis->setnx("cron:task", time());
if ($lock) {
    $redis->expire("cron:task", 60);
    // 执行任务
}

任务状态存储
数据库记录任务状态（进行中、完成）
失败任务自动重试
消息队列（Kafka / RabbitMQ）
确保任务执行至少一次（ACK机制
*/

// 解决任务重复执行：Redis 分布式锁 可以使用 Redis 分布式锁 确保同一时间只有一个任务在执行：
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// 获取锁（setnx = SET if Not Exists）
$lock = $redis->setnx("cron:task", time());

if ($lock) {
    $redis->expire("cron:task", 60); // 60秒后自动释放锁

    // 执行定时任务
    try {
        cleanExpiredData(); // 例如清理过期数据
    } catch (Exception $e) {
        error_log("任务失败：" . $e->getMessage());
    }

    // 任务完成后删除锁
    $redis->del("cron:task");
} else {
    echo "任务正在执行，跳过...";
}
// 问题 如果 expire(60) 之前任务执行完毕但进程崩溃，锁不会自动释放，因此可以使用 Redis 分布式锁 + Lua 脚本 确保锁的完整释放：