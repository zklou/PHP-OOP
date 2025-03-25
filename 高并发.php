<?php 

// 高并发场景下如何优化 PHP 应用？
// 场景： 你的 PHP 网站遇到了高并发访问，导致响应变慢甚至崩溃。如何优化？

/*
缓存优化
使用 Redis / Memcached 缓存热点数据，减少数据库查询
页面级缓存：静态 HTML 或 OPcache
Query Cache（MySQL 8.0 已移除），可考虑 Redis 代替
数据库优化
SQL 查询优化（索引、EXPLAIN 分析慢查询）
读写分离，主从数据库架构
分库分表（如 MySQL 分片或使用中间件）
代码优化
异步处理：使用队列（RabbitMQ、Kafka）分流任务
避免不必要的循环、减少不必要的计算
PHP-FPM 配置优化（调整 pm.max_children 等参数）
负载均衡
Nginx + PHP-FPM 多进程
CDN 加速静态资源，减少服务器压力
服务器集群 + 负载均衡（Nginx、HAProxy
*/


// 短链接服务？
// 场景： 设计一个类似于 Bit.ly 的短链接生成系统，支持高并发访问

/*
核心需求
短链接唯一性（哈希或自增ID）
快速解析短链并跳转
支持高并发
方案
生成短链：
自增 ID + Base62 编码（避免 UUID 过长）
哈希（MD5 / SHA1 但可能有冲突）
存储：
Redis（短链访问快，但数据持久性差）
MySQL（持久化存储，配合缓存）
解析：
先查 Redis，查不到再查 MySQL
用 Nginx + Lua 直接在 Nginx 层解析，减少 PHP 解析压力
扩展优化
负载均衡（Nginx / LVS / HAProxy）
分布式存储（HBase、Cassandra）
短链过期策略（定期清理 Redis 过期 Key）
*/

// 设计一个秒杀系统？
// 场景： 你的 PHP 网站要举办一个秒杀活动，百万用户同时抢购，如何设计？

/*
限流
使用 Redis 限流（令牌桶、滑动窗口）
Nginx 层限流 limit_req_zone
库存扣减
使用 Redis 记录库存，减少数据库压力
Redis decr 操作实现原子扣减
异步处理
消息队列（RabbitMQ / Kafka）异步下单
订单异步写入 MySQL
最终一致性
分布式锁（Redis + Lua 脚本防止超卖）
事务补偿（定期扫描 Redis 和数据库数据）
*/
Lua 脚本
用户请求 --> Nginx 限流 --> PHP 业务层
           --> Redis 库存扣减
           --> RabbitMQ 消息队列
           --> MySQL 订单入库
           --> Redis + MySQL 定期对账

           优化点	实现方式
           限流	Nginx limit_req_zone + Redis 令牌桶
           库存扣减	Redis DECR + Lua 脚本
           异步下单	RabbitMQ / Kafka
           数据一致性	Redis + MySQL 对账
           防止超卖	Redis Lua 原子操作
           高并发优化	读写分离 + 负载均衡
// 聊天系统
// 场景： 你要开发一个 WebSocket 实时聊天系统，支持 1v1 聊天和群聊，如何设计？

/*
WebSocket 连接
使用 Swoole / Workerman / Ratchet
消息存储
Redis 记录未读消息
MySQL 存储历史消息（分表存储，避免大表）
用户状态
Redis 记录在线用户（set user:online:<id> true）
群聊消息
发布/订阅（Redis Pub/Sub）
批量拉取离线消息
消息推送
WebSocket 直连推送
Fallback：使用 Pusher / Firebase Cloud Messaging
*/