<?
session_start();

if( isset($_POST["code"])){
	$code = $_POST["code"];
	if($_SESSION["validationCode"] == $code && $code != NULL){
		echo "验证成功";
	}else{
		echo "验证失败";	
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

<img src="imgCode3.php" title="看不清楚，点击换一张" onClick="changePic(this, this.src)">
<script>
function changePic(obj, src){
	//ie7和ff图片无刷新
	obj.src = src +"?value=" + (+new Date());	
}
</script>

<form method="post" action="image3.php">
	<input type="text" name="code">
    <input type="submit">
	
</form>

</body>
</html>
