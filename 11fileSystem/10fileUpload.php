<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
    <style type="text/css">
    </style>
</head>

<body>
<?php
/*//4.0 文件的上传与下载
if($_FILES['myfileName']['error'] >  0){
    echo "<br>4.0文件上传错误";
    switch($_FILES['myfileName']['error']){
        case 1:
            echo "<br>文件过大，超过约定值:".upload_max_filesize;
            break;
        case 2:
            echo "<br>文件上传超过了表单约定值:".MAX_FILESIZE;
            break;
        case 3:
            echo "<br>只上传部分";
            break;
        case 4:
            echo "<br>没有上传";
            break;
        default:
            echo "ca";
            exit;
    }
}

$fileType = $_FILES['myfileName']['type'];
echo "<br>";
echo "<br>4.1上传文件类型:".$fileType;

$fileName = $_FILES['myfileName']['name'];
echo "<br>";
echo "<br>4.2上传文件名称:".$fileName;

list($miantype, $subtype) = explode("/", $fileType);
if($maintype == "text"){
    echo "不能上传文本文件";
    exit;
}

$upfile = "upflie/".time().$_FILES['myfieName']['name'];
if(is_uploaded_file($_FILES['myfileName']['tmp_name'])){
    if(!move_uploaded_file($_FILES['myfileName']['tmp_name'], $upfile)){
        echo "<br>4.3.2".$_FILES['myfileName']['name'];
        exit;
    }
}else{
    echo "<br>4.3上传文件是个非法文件:".$_FILES['myfileName']['name'];
    exit;
}

echo "<br>";

*/?>

	<pre>
    application/x-www-form-urlencoded： 窗体数据被编码为名称/值对。这是标准的编码格式。 
    multipart/form-data： 窗体数据被编码为一条消息，页上的每个控件对应消息中的一个部分。 
    text/plain： 窗体数据以纯文本形式进行编码，其中不含任何控件或格式字符。
    </pre>
	

<form method="post" action="10upload.php" enctype="multipart/form-data">

	<input type="file" name="myfileName">
    <input type="hidden" name="MAX_FILESIZE" value="100 0000">
    <input type="submit" value="上传文件">
</form>

<script>
var enctype = document.forms[0].enctype;
//alert(enctype);
</script>

<?php

//phpinfo();

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
			a. fwite()
			b. file_put_contents();直接写入不需要open

		3.3 读取文件内容
			a. fread打开指定长度的字符串 和file_get_contents
			b. fgets读取一行 和 fgetc 返回一个包含有一个字符的字
			c. file把整个文件读入数组 和 readfile

		3.5 移动文件指针
			a. ftell返回当前指针的位置
			b.fseek指针移动第二个参数指定的位置 SEEK_CUR
			c.rewind移动文件开头

	4.0 文件的上传与下载




 */

//3.5 移动文件指针
 echo "<h2>3.5 移动文件指针</h2>";
$fileName = "1.txt";
function fileIndex(){
	global $fileName;
	$handler = fopen($fileName, "a+"); //a+写入文件模式打开

	//a. ftell返回当前指针的位置
	echo "<br>a. ftell当前指针位置:".ftell($handler);
	//fread
	//$fread = fwrite($handler, "asss\n");
	$fread = fread($handler, 13);
	echo "<br>a. fread读取后, ftell当前指针位置:".ftell($handler);

	//b. fseek
	fseek($handler, -2, SEEK_CUR);
	echo "<br>b. fseek设置后, ftell当前指针位置:".ftell($handler);
	fseek($handler, -2, SEEK_END);
	echo "<br>b. fseek设置后, ftell当前指针位置:".ftell($handler);
	fseek($handler, -2, SEEK_SET);
	echo "<br>b. fseek设置后, ftell当前指针位置:".ftell($handler);

	//c.rewind移动文件开头
	rewind($handler);
	echo "<br>b. rewind设置后, ftell当前指针位置:".ftell($handler);

}
fileIndex();


//3.3 读取文件内容
 echo "<h2>3.3 读取文件内容</h2>";
function fileRead(){

	//3.3 读取文件内容
	//从文件中读取指定字节的内容，保存在一个变量中
	$fileName = "e:/test/write.txt";
	$file = fopen($fileName, "r") or die("<br>打开文件失败.");
	$contents =	fread($file, filesize($fileName));
	fclose($file);
	echo "<br>3.3.1 fread读取:".$contents;

	$gifName= "e:/test/s.png";
	$handleGif = fopen($gifName, "rb") or die("failed open file.");
	$contentgif = "";
	while(!feof($handleGif)){
		$contentgif .= fread($handleGif, 1024);
	}
	fclose($handleGif);
//	echo "<br>3.3.2 fread二进制读取:".$contentgif;

	//file_get_contents
	$contentGet = file_get_contents($fileName);
	echo "<br>3.3.3 file_get_contents二进制读取:".$contentGet;

	echo "<br>";

	//fgets一次读取一行
	$fileName2 = "e:/test/data.txt";
	$handlerFgets = fopen($fileName2, "r");
    $contentFgets = "";
	while(!feof($handlerFgets)){
		$contentFgets .= "<br>".fgets($handlerFgets);
	}
	fclose($handlerFgets);
	echo "<br>3.3.3.a fgets读取一行:".$contentFgets;

		//fgetc从文件指针中读取字符


	$fileName3 = "e:/test/data.txt";
	$fp = fopen($fileName3, "r");
    $contentFp = "";
	while(false !== ($char = fgetc($fp))){
        $contentFp .= $char;
	}
	fclose($fp);
	echo "<br>3.3.3.a fgetc读取字符:".$contentFp;

	//函数file
	echo "<br>3.3 file把文件读入到数组中:";
	var_dump(file($fileName3));

	//readfile
	echo "<br>3.3函数readfile直接输出:";
	readfile($fileName3);

}
fileRead();


//3.2 写入文件
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


?>


</body>
</html>
