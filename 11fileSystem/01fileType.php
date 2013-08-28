<?php
/*
  十一.文件系统处理
  1.文件系统概述
  
  	1.1 文件类型
		dir file unknown
		
	1.2 文件属性
		1.2.1 文件大小 filesize 	
	 	1.2.2 清除缓存文件信息 clearstatcache
 */
header("Content-type:text/html; charset=utf-8"); 

 
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
<style type="text/css">
    @media screen and(min-width:800px;){
        .div{background-color: red;}
    }
    @media  screen and(min-width:1000px;){
        .div{ background-color: yellow; font-size: 25px;}
    }

</style>
<div class="div">test123</div>