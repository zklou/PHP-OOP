<?php
/*

一、PHP 核心
请解释 PHP 的垃圾回收机制（Garbage Collection），并分析其在高并发场景下可能带来的问题。 gc为循环释放，高并发会引起抖动,可以手动回收
OPcache 会生成缓存空间
在 PHP 代码中，如何高效处理大量 JSON 数据（如大于 100MB 的 JSON 文件）？ jsonstreamingparser
Lazy Loading 图片，数据库调用 function加速
PHP 的 Fiber（协程）是什么？在什么情况下应该使用？ 高并发 异步编程
*/



/*
二、数据库与性能优化
InnoDB 行级锁，MyISAM表级锁
EXPLAIN会帮助找问题，优化。
Redis 适合读写快

在 Laravel/Symfony 等框架中，如何避免 N+1 查询问题？请举例说明。
MySQL 的 MVCC（多版本并发控制）如何运作？哪些查询受 MVCC 影响？
如何在 PHP 代码中处理慢查询？请介绍几种常见的分析和优化手段。
PHP 的 PDO（PHP Data Objects）和 MySQLi 有哪些主要区别？在企业级应用中推荐使用哪个？
当 PHP 处理高并发 MySQL 事务时，如何有效降低死锁（Deadlock）的可能性？
*/

/*
JWT 讲讲
XSS InnerHTML

如何使用 PHP 实现 OAuth2 认证流程？
在 Laravel/Symfony 等框架中，如何加强 API 鉴权以防止非法访问？
如何在 PHP 代码中安全地存储和验证用户密码？请比较 bcrypt、argon2 和 md5。
*/

/*
四、架构与微服务
如何在 PHP 代码中实现 Circuit Breaker（断路器模式）？
如何在 PHP 微服务架构中实现服务注册与发现？请列举常用方案。
如何在 PHP 应用中实现事件驱动架构（EDA）？适用于哪些场景？
如何使用 PHP 连接 Apache Kafka？在消息队列的使用场景下，有哪些性能优化策略？
在 PHP 微服务架构中，如何保证数据一致性？请介绍 SAGA 模式的实现方式。
如何在 PHP 应用中实现幂等性（Idempotency）？请举例说明。
如何在 PHP 项目中使用 API 网关？请列举几种常见的 API 网关解决方案。
请介绍 PHP 在 Kubernetes（K8s）上的部署方式及最佳实践。
如何在 PHP 应用中使用 gRPC？相比于 REST API，有哪些优势？
如何在 PHP 代码中实现负载均衡？请列举几种不同的方式。
*/

/*
五、性能优化
PHP 如何优化长时间运行的脚本？
如何使用 APCu、Redis 或 Opcache 来优化 PHP Web 应用的性能？
如何减少 PHP 应用的 CPU 和内存使用？请列举 3 种方法。

在 PHP 应用中，如何实现异步任务处理？请介绍几种常见方法。 短任务用 exec(),任务队列用 Redis,高并发用 Swoole;

如何在 PHP 代码中实现高效的缓存策略？请列举 TTL 设计的关键点。 //ttl是什么

讲讲lavaral
*/