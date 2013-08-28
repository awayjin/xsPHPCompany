<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
/*
	1.0 date()函数
	2.0 unix时间戳 mktime
		2.0 time()
		2.1 mktime()
		2.2 date("U")
		2.3 mktime
	
	3.0 getdate()函数	
	
	4.0 checkdate() 检验日期有效性
	
	5.0 strftime()根据区域设置格式化本地时间／日期


		
 */

echo "".date("M jS, Y");

echo "<br>";

echo "<br>2.0 time():".time();
echo '<br>2.1mktime忽略参数:'.mktime();
echo '<br>2.2 date("U"):'.date("U");

echo "<br>2.4mktime:".mktime(0, 59, 59);
echo "<br>2.4mktime:".mktime(22, 59, 59, 5, 17);

echo "<hr><br>检查日期是否有效:";
var_dump(checkdate(5, 26, 2013));

echo "<br>";

setlocale(LC_TIME, "C");

//5.0 strftime()根据区域设置格式化本地时间／日期
echo "<br>5.1%a:".strftime("%a");
echo "<br>5.2%A:".strftime("%A");
echo "<br>5.3%b:".strftime("%b");
echo "<br>5.4%B:".strftime("%B");
echo "<br>5.3%c当前区域首选的日期时间表达 :".strftime("%c");
echo "<br>5.4%C世纪值（年份除以 100 后取整，范围从 00 到 99）:".strftime("%C");
echo "<br>5.3%d:".strftime("%d");
echo "<br>5.4%Y:".strftime("%Y");


echo "<br>";
echo "<br>3.0getdate:";
$todays = getdate();
print_r($todays);
foreach($todays as $key=>$value ){
	echo "<br>3.1 getdate[".$key."]:".$value;	
}
print_r($todays["month"]);

?>

<script>
//unix时间戳
console.log("js unix时间戳:", Math.round(new Date().getTime()/1000));

console.log(new Date().getTime())
</script>
</body>
</html>

<?php

//phpinfo();
?>