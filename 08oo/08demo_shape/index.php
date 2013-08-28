<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
//自动加载对象
function __autoload($className){
	include "class_".ucfirst($className).'.php';
}

?>
<header><h1><a href="index.php">计算三角形的面积</a></h1></header>

<a href="index.php?action=1">矩形</a>
<a href="index.php?action=2">三角形</a>
<a href="index.php?action=3">圆形</a><br>

<?php
print(($_GET['action']));

	switch ($_GET['action']){
		case 1:
			//矩形
			$form = new Form("矩形", $_GET, 'index.php');
			echo $form;
			break;
		case 2:
			//三角形
			//$from = new Form();
			break;
		case 3:
			break;	
		default:
			echo "请选择形状！";	
				
			
	}
	
	if(isset($_GET['act'])){
		switch($_GET['act']){
			case 1:
				$rect = new Rect($_GET);
				$rect ->area();
				break;	
		}
		echo "<br>面积为:".$rect->area();
			echo "<br>长度为:".$rect->perimeter();
	}
?>

</body>
</html>