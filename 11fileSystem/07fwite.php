<?php
header("Content-type:text/html; charset=utf-8");

/*
  十一.文件系统处理
  1.0 文件系统概述
  	1.1 文件类型
		dir file unknown
		
	1.2 文件属性
		1.2.1 文件大小 filesize 	
	 	1.2.2 清除缓存文件信息 clearstatcache
	
   2.0 目录的基本操作
   	  2.1 解析目录路径(pathinfo)
	  	 basename dirname extension 
		 
   	  2.2 遍历目录	
	  		a. $s = opendir("e:\test");
			b. $file = readdir($s);
				$dirFile = $filename."/".$file
				filesize($d) filetype() filemtime()
			c. closedir($s);				

   	  2.3 统计目录大小	
	  	 filesize() 递归
		 
	  2.4 建立和删除目录
	  	  先unlink()删除文件，再;mkdir($pathname)	
		 	
	  2.5 复制或移动目录
	  	  copy($source, $destination);
		  
	3.0	文件的基本操作
		3.1 文件的打开与关闭
	  	  a. open($filename, $mode, $use_include_path, $protocal)`
	  		mode: r w b
		3.2 写入文件
			
			 
 */
 
echo "<h2>3.2 文件的写入</h2>";	
function fileWrite(){
	$handle = fopen("e:/test/write.txt", "wb");
	for($i=0, $len=10; $i<$len; $i++){
		fwrite($handle, "3.1.".$i." write test 10.\n\r", 30);
	}	
	fclose($handle);
	
	//快速写入文件
	$fileName = "e:\\test\\data.txt";
	$data = "共10行数据\n";
	for($row=0; $row<10; $row++){
		//$data = $data.$row.":codegoing.com\n";
		$data .= $row.":codegoing.com\n";
	}
	file_put_contents($fileName, $data);
}
fileWrite();

//字符串运算符
$data = "<h3>共10行<h3>";
echo "<br>字符串运算符:".$b;
echo "<br>3.2字符串运算符:".$c;
$i=0;
 while($i<10){
	 $data .= $i."<br>";
	// echo $data;
	 $i++;
 }
 echo "<br>".$data;
 
 

//3.1 文件的打开与关闭
function fileOpenClose(){
echo "<h2>3.1 文件的打开与关闭</h2>";	
	// r 只读方式打开文件
	@$handle1 = fopen("1.txt", "r");
	var_dump($handle1);
	
	// r 根目录下的文件
	$docRoot = $_SERVER['DOCUMENT_ROOT'];
	echo "<br>3.1根目录:".$docRoot;
	$handle2 = fopen("$docRoot/config.xml", "r");
	echo "<br>3.1 handle2:".($handle2);
	
	// wb二进制和只写模式组合
	$handle3 = fopen("E:\\test\\2.txt", "wb");
	echo "<br>3.1 handle3:".($handle3);
	
	// r 打开远程文件
	$handle4 = fopen("http://www.baidu.com/img/bdlogo.gif", "r");
	echo "<br>3.1 handle4:".($handle4);
	$flocse5 = fclose($handle4);
	echo "<br>2.5 flocse5:".$flocse5;
}
fileOpenClose();


phpinfo();
?>

<script>

    //屏蔽右键
   // document.oncontextmenu=function(e){return false;}
   // document.onselectstart=function(){return false;}
    //屏蔽F12 F11 F5键, 兼容ie 6 7 8 ff chrome
    document.onkeydown =function(e){
		var e = e || window.event;
        if(e.keyCode == 123 || e.keyCode == 122 || e.keyCode == 116){
			//e.keyCode = 0; 
			//e.cancelBubble = true; 
			//return false;
        }
    }
	c = "wobu";
for(i=0; i<10; i++){
	debugger;
   c += i;
}
c;
</script>