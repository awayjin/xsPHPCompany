<?php
session_start();
var_dump($_POST["validationText"]);
echo '<br>';

if( isset( $_POST["validationText"] ) ){
	if( trim($_POST["validationText"]) == $_SESSION['validationCode'] ){
		echo "<h2>提交成功</h2>";	
	}else{
		echo "<h2>提交不成功</h2>";	
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

<img src="imgcode2.php" title="看不清楚，换一张试试" style="cursor:pointer;" onclick="changePic(this, this.src);">

<script>
function changePic(obj, url){
	//obj.src = url+ '?nowtime=' + new Date().getTime();
	//后面传递一个随机参数，否则在IE7和火狐下，不刷新图片
	obj.src = url + '?nowTime=' + (new Date()).getTime();
}
</script>

<form action="image2.php" name="formCode" method="post">
	<input type="text" name="validationText">
    <input type="submit" value="提交">
</form>



</body>
</html>