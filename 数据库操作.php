<?php 

//  PHP 读取 langref.txt 并插入到数据库 (php_index 表)
// 这个 PHP 脚本会：
// 读取 langref.txt 文件 并解析 title 和 link 信息。
// 将数据插入 MySQL 数据表 php_index。

/*
CREATE TABLE php_index (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    link TEXT NOT NULL
);
*/

// build sql connection
$host = "localhost"; // zhuji
$dbname = "database";// 数据库名称
$username = "username"; // 数据库用户名
$password = "pwd"; // 数据库密码

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->numfmt_set_attribute;

    echo "succeed"
} catch (PDOException $e){
    die("failed". $e->getMessage()); //为什么使用die 
}

// import file 
$filename = "";
if (!file_exists()){
    die("not exist");
}

$handler = fopen(,"r")//这个r是做什么
if (!$handler){
    die("open failed");
}

// read 
while ($line != false){
    if (regex match){ // get data by regex;
        $title = trim();
        $link = trim();
    }
    try{ //insert
        $stmt = $pdo->prepare();
        $stmt->execute([]);
    } catch (pdoException $e){
        echo "failed"; // why it is not die;
    }
}

// close
fclose($handler);


// die() 会立即终止脚本执行，防止代码继续运行
// echo 仅用于显示错误信息，但不会终止整个脚本

// stmt（PreparedStatement）防止 SQL 注入的作用
// 它们的主要作用是防止 SQL 注入攻击 和 提高执行效率。

// 文档解析
// TXT  file_get_contents()
// JSON json_decode()
// CSV  fgetcsv()
// LOG  file()