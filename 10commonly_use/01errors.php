
<?php

//0 将错误放到系统日志里
error_log("数据库不可用", 0);

//1 通过Mail()函数
//error_log("发到邮箱中的错误", 1, "258246377@qq.com");

//2 送到TCP服务器中
//error_log("TCP服务", 2, "localhost");

//3 送到本地文件中去
//$date = date('d.m.Y h:i:s');
$date = date('Y-m-d h:i:s');
$msg = "发关本地文件Date:  ".$date."\n"; 

error_log($msg, 3, '/errors.log');

?>
