<?php

// 防止 CSRF 攻击 ：： 使用token，cookie
// 场景： 你的网站用户点击了一个钓鱼链接，结果不知不觉修改了自己的密码，如何防止这种攻击？
/*
使用 CSRF Token
生成 Token 并存入 Session
提交表单时带上 Token
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
后端校验：
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF attack detected!");
}
Referer 校验
检查 HTTP_REFERER 是否来自本站
SameSite Cookie
*/

// 生成 Token 并存入 Session

// 验证
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF attack detected!");
}