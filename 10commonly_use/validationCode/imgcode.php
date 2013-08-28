<?php
	session_start();
	require_once("validationCode.php");
	$image = new validationCode(60, 30, 4);
	$image->showImage();
	
	//把相应的字符存入会话中
	$_SESSION['validationcode'] = $image->getCheckCode() ;
	

	
?>


<?
///*
////printf 将一个格式化的字符串输出到浏览器
////sprintf 返回一个格式化了的字符串
//	
//	1.0 print 语言结构 与echo 相比具有返回值 
//	2.0 printf 
//		2.1 %s 字符串替换
//		2.2 %.7f格式化小数7位
//		2.3 补齐位数 %08s  %'s8s"
//		2.4 多个转换说明
// */
//
//print(0); //false不打印
//$total = 132.500;
////2.1 %s 字符串替换
//printf("<br>字符串替换Total amount of order is %s", $total);
//
////2.2 %.7f格式化小数7位 
//printf("<br>格式化小数7位 Total amount of order is %.7f", $total);
//
////2.3 补齐位数 %08s
//$total11 = 255;
//printf("<br>补齐位数Total amount of order is %'s8s with(%.10f)", $total, $total11);
//
////2.4 多个转换说明
//$total2 = 111;
//printf("<br>多个转换说明%%Total amount of order is (%2\$.2f) with(%1\$.2f)", $total, $total2);
//
//
//$name="张三";
//$money1=68.75;
//$money2=54.35;
//$money=$money1+$money2;
//$formatted=sprintf(iconv("utf-8", "utf-8", "%s有￥%01.2f。"),$name,$money);
////echo $formatted;
//
//echo "<br><br>php获取当前时间戳".time().",:".date('Y-m-d H:i:s',time());

?>
