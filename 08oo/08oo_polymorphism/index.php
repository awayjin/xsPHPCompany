<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<?php
//phpinfo();

//自动加载类
function __autoload($className){
	include "form/class_".ucfirst($className).".php";
}
?>


<header>
	<h2><a href="index.php">图形的周长和面积计算器</a></h2>           <!-- 页面主题 -->
	<hr>
    <a href="index.php?action=1">矩形</a> ||  
    <a href="index.php?action=2">三角形</a> || 
    <a href="index.php?action=3">圆形</a>
    
    <?php
    	switch($_GET['action']){
			case 1:
				$form = new Form("矩形", $_GET, "index.php");
				echo $form;
				break;
			case 2:
				echo '22';
				break;
			case 3:
				echo 33;
				break;
			default:		
				echo "<br>请选择一个图形Shape.";	
		}
	
		if( isset($_GET['act']) ){
			switch( $_GET['act'] ){
				case 1:
				 $rect = new Rect($_GET);
				 break;	
			}
			echo "<br>面积为:".$rect->area();
			echo "<br>长度为:".$rect->perimeter();

		}
		
		
	?>
    
</header>
</body>
</html>