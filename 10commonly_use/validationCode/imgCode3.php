<?php
//header("Content-type:text/html;charset=utf-8");
session_start();

/*printf("%c", rand(65, 80));
echo "<br>".rand(65, 80);

echo "<br>解释为整数作为二进制输出:";
printf("%b", rand(65, 80));
echo "<hr>";
*/
include("validationCode3.php");

//firephp调试
require_once("../../FirePHPCore/fb.php");


$image = new ValidationCode(80, 30, 4);
$image->showImage();

$_SESSION['validationCode'] = strtolower($image->getCode());



//$_SESSION["stringCode"] = $image->getCheckCode();

//phpinfo();
?>
<style>
body{font-size:28px;}
</style>