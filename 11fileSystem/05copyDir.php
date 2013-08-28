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
   
   		
 */

header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC"); //

//建立和删除目录
$pathN = "e:/test2";
rmdir($pathN);
mkdir($pathN);


define(CONSTANT, 1371103152); //定义一个时间戳常量 
echo "<br>程序创建时间戳：".CONSTANT.",当前时间以戳:".mktime();
echo "<br>当前时间:".date("Y-m-d, H:i:s", time());

echo "<h2>十一章 test</h2>";

function test(){
	$dirname = "traversal";
	$s = opendir($dirname);
	
	$s2 = opendir($dirname);
	$file2 = readdir($s2);
	$dirFil2 = $dirname."/".$file2;
	echo "<br>test2:".$dirFil2;
	$file3 = readdir($s2);
	echo "<br>test2:".$file3 ;
	$file4 = readdir($s2);
	echo "<br>test2:".$file4;
	
	while($file = readdir($s)){
		$dirflie = $dirname."/".$file;
		echo "<br>test:".$dirflie;
	
	}
}
test();


//2.5 复制或移动目录
echo "<h2>2.5 复制或移动目录</h2>";
$file = 'e:\test\2.txt';
$newfile = 'e:\test\2.txt.'.mktime().'.bak';
if (@!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}else{
	echo "successed to copy: $file";	
}

//复制目录
function copyDir($dir, $toDir){
	if(is_file($dir)){
		echo "<br>2.5请输入目录名";
		return;
	}
	
	//如果目录不存在,则创建目录
	if(!file_exists($toDir)){
		mkdir($toDir);
	}
	
	if($file = opendir($dir)){
		while($filename = readdir($file)){
			
			if($filename != "." && $filename != ".."){
				
				$subFile = $dir."/".$filename;
				$subToFile = $toDir."/".$filename;
				
				echo "<br>2.5: ".$subFile;
				
				//若是目录，则递归
				if(is_dir($subFile)){
					copyDir($subFile, $subToFile);
				}
				
				if(is_file($subFile)){
					copy($subFile, $subToFile);
				}
			}
			
		}
		
		closedir($file);
		echo "<br>2.5 copy successed.";
	}else{
		echo "<br>2.5文件打开失败";	
	}
	
}
copyDir('traversal', 'e:/test/traversal222');


echo "<hr>";
// 2.4 建立和删除目录
echo "<h2>2.4 建立和删除目录</h2>";

//echo "<br>2.4建立目录:".mkdir("E:/test");	
//echo "<br>2.4建立目录:".mkdir("E:/test/test");	
if(file_exists("E:/test/1.txt")){
//echo "<br>2.4建立目录:".mkdir("E:/test");	
//echo "<br>2.4建立目录:".mkdir("E:/test/test");	
//echo "<br>2.4判断目录是否存在:".var_dump(file_exists("E:/test/test"));	
echo "<br>2.4删除目录中的文件:";
var_dump(unlink("E:/test/1.txt"));	

}
//echo "<br>4.2:".unlink("E:/test/test/1.txt");
//rm -rf "E:/test/test";


//2.4删除目录
$dir_name_r = "e:/11";
//$r_handler = opendir($dir_name_r);
echo "<br>2.4删除空目录:".delDir($dir_name_r);;

function delDir($dir){
	if(file_exists($dir)){
		if($dir_handler = @opendir($dir)){
			while($filename = readdir($dir_handler)){
				if($filename != "." && $filename != ".."){
					$subfile = $dir."/".$filename;
					//目录
					if(is_dir($subfile)){
						delDir($subfile);			
					}
					//文件即删除
					if(is_file($subfile)){
						//删除文件
						unlink($subfile);
					}
				}
			}
			closedir($dir_handler);
			//删除目录
			rmdir($dir);
			
		}	
			
	}
}
echo "<br>删除目录:".delDir("e:/test/test");

echo "<hr>";
//2.3 统计磁盘大小
	$size_disk = disk_free_space("e:\Ant");
	echo "<br>e盘目录中的可用空间大小:".round($size_disk/pow(1024, 3), 2)." G";
	$size_total = disk_total_space("e:");
	echo "<br>e盘目录中的总空间大小:".round($size_total/pow(1024, 3), 2)." G";
	
function dirTotalSize($dir){
	$dir_size = 0;
	if($dir_handler = @opendir($dir)){
		while($filename = readdir($dir_handler)){
			if($filename != "." && $filename != ".."){
				$subFile = $dir."/".$filename;
				if(is_dir($subFile)){
					$dir_size += dirTotalSize($subFile);
				}
				
				if(is_file($subFile)){
					$dir_size += v($subFile);	
				}
				
			}
		}	
		closedir($dir_handler);
		return $dir_size;
	}
	
} 
echo "<br>ant:".dirTotalSize("E:\gtaDialog\SmartQueue\smart-queue")."kb";


//2.2 遍历目录
function traversalDriectory(){
	$path = "Traversal";
	echo '<table border="1" align="center" width="800" cellpadding="0" cellspacing="0">';
	echo '<caption><h2>遍历'.$path.'目录下的所有文件及目录<h2></caption>';
	echo '<tr align="left"><th>名称</th><th>文件大小</th>
		<th>文件类型</th>
		<th>修改时间</th>
	</tr>';
	$num = 0;
	$dir_handler = opendir($path);
	while($file = readdir($dir_handler)){
		$fileName = $path."/".$file;
		echo '<tr>';
		echo "<td>".$file."</td>";
		echo "<td>".filesize($fileName)."</td>";
		echo "<td>".filetype($fileName)."</td>";
		echo "<td>".date("Y/n/t", filectime($fileName))."</td>";
		echo'</tr>';
	}
	
	echo '</table>';
}
traversalDriectory();

//2.1解析目录路径
parsePath();
function parsePath(){
//echo "".DIRECTORY_SEPERATOR;
	echo "<hr><h2>2.1 解析目录路径</h2>";
	$dirOpe = "E:\QIC\show\logs\qic_show_error.log.2013-05-24.log";
	$file = basename($dirOpe, "php"); 
	echo "<br>2.1 basename:".$file;
	
	$dirOpe2 = "c:/";
	$dir = dirname($dirOpe2);
	echo "<br>2.1 dirname返回文件的目录:".$dir;
	
	$path_parts = pathinfo($dirOpe);
	echo "<br>2.1 pathinfo::".$path_parts["dirname"].", ".$path_parts["basename"].
	", ".$path_parts["extension"];	
}
?>
<script>
var c =22;
debugger;
</script>

<script>
var c22 =22;

</script>