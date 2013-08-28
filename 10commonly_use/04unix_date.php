<?php
header("Content-type:text/html; charset=utf-8");

/*1.0 unix时间戳
 *  1.1将日期和时间转变为UNIX时间戳
 	1.2 日期的计算
  
  2.0 获取日期和时间
   	 getdate() time() mktime() date()
	
  3.0 修改默认的时区	
	
 */
//3.0 修改默认的时区 
echo "<br>3.1没有设置时区是UTC时间".date("H", time());
echo "<br>3.2".date_default_timezone_get(); 
date_default_timezone_set("Etc/GMT-8");
echo "<br>3.3设置了prc:".date("H", time());


echo "<hr>";

echo "<br>".date("M-d-Y", mktime(0, 0, 0, 12, 30, 2007)); 
echo "<br>1.0.1date函数mktime参数为空，采用date:".date("M-d-Y", mktime()); 
echo "<br>date函数mktime参数设置，采用date:".date("M-d-Y", mktime(24)); 
echo "<br>1.0mktime参数为空,直接输出:".mktime(); 
echo "<br>mktime参数设置:".mktime(0, 0, 0, 11); 

//1.2 日期的计算
$year =2012;
$month = 4;
$day = 11;
$birth = mktime(0, 0, 0, $month, $day, $year);
echo "<br>1.1日期的计算:".date("M-d-Y", $birth);
$nowdate = time();
echo "<br>1.2当前时间戳:".$nowdate;
$age = floor( ($nowdate-$birth) / (60*60*24*365) );
$days = floor( ($nowdate-$birth) / (60*60*24) );

echo "<br>1.3实际年龄:".$age;
echo "<br>1.4 ".date("Y年m月d日", mktime(0, 0, 0, $month, $day, $year))."到现在经过的天数:".$days;

//2.0 获取日期和时间
echo '<br>2.1 time获得时间戳:'.time();
echo '<br>2.2 mktime and date:'.date("Y-m-d", mktime(0, 0, 0, 11));
echo "'<br>2.3 getdate:'";
$test = getdate();
print_r($test[minutes]);
echo "'<br>2.4mktime时间戳:'".mktime();

/* 计算葡萄牙里斯本的日出时间
Latitude:  北纬 38.4 度
Longitude: 西经 9 度
Zenith ~= 90
offset: +1 GMT
*/


echo "<br>".date("D M d Y"). ', sunrise time : ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1);

$arr =array('cc'=>111);
echo "<br>2.4:".$arr[cc];




phpinfo();

?>