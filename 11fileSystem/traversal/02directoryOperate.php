<?php
/*
  十一.文件系统处理
  1.文件系统概述
  	1.1 文件类型
		dir file unknown
		
	1.2 文件属性
		1.2.1 文件大小 filesize 	
	 	1.2.2 清除缓存文件信息 clearstatcache
	
   2.目录的基本操作
   	  2.1 pathinfo关联函数 basename dirname extension 
   		
	  2.2 遍历目录
   	
   
   		
 */
header("Content-type:text/html; charset=utf-8"); 

//2.目录的基本操作
	echo "".DIRECTORY_SEPERATOR;
	
	$dirOpe = "c:\windows\php.ini";
	$file = basename($dirOpe, "php"); 
	echo "<br>".$file;
	
	$dirOpe2 = "c:/";
	$dir = dirname($dirOpe2);
	echo "<br>返回文件的目录:".$dir;
	
	$path_parts = pathinfo($dirOpe);
	echo "<br>2.1:".$path_parts["dirname"].", ".$path_parts["basename"].
	", ".$path_parts["extension"];
	
echo "<hr>";

	// 2.2 遍历目录
	$num = 0;
	$dirname = "traversal";
	$dir_handler = opendir($dirname);
	
	

echo "<hr>";

 
echo "<br>得到默认时区:".date_default_timezone_get();
//设置默认时区
date_default_timezone_set("PRC");

echo "<br>".iconv_get_encoding('all');

//1.1 文件类型
	$txt = "<br>1.0普通文件类型:";
	echo iconv("UTF-8", "utf-8", $txt).filetype("C:\WINDOWS\php.ini");
	$txt2="<br>1.1目录文件类型:";
	echo iconv("utf-8", "utf-8", $txt2).filetype("C:\WINDOWS");
	//filetype("C:\WINDOWS\php.ini")

echo "<hr>";

//1.2 文件属性
	//2.1 filesize
	echo iconv("utf-8", "utf-8", "<br>2.1php.inc 文件大小:").filesize("C:\WINDOWS\php.ini");	
	//1.2.1 filesize
	$cfiletime21 = filectime("C:\WINDOWS\php.ini");
	echo iconv("utf-8", "utf-8", "<br>2.1php.inc 文件创建时间:".$cfiletime21);	
	
	echo "<br>".date("Y-m-d, H:i:s", $cfiletime21);
	
	//1.2.2 清除缓存文件信息
	function getFilePro($fileName){
	  	if(!file_exists($fileName)){
			echo $fileName."文件不存在<br>";	
		}
		
		if(!is_file($fileName)){
			echo $fileName."是一个普通文件<br>";	
		}
		
		if(!is_dir($fileName)){
			echo $fileName."是一个目录<br>";	
		}
		
	}	



?>