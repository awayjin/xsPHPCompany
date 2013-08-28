<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by JetBrains PhpStorm.
 * User: jinwei
 * Date: 13-7-12
 * Time: 下午2:08
 * To change this template use File | Settings | File Templates.
 */
//ctrl+alt+f10 跳转文件至磁盘

function __autoload($className){
    require($className."_class.php");
}
if(isset($_POST['action'])){
    $fileAction = new FileAction($_POST['fileName'], $_POST['action']);
    $fileAction->option();
}

if(isset($_GET['dirName'])){
    $fs = new FileSystem($_GET["dirName"]);
}else{
    $fs = new FileSystem();
}
$fs->getMenu();


?>
<!--<img src="prototype.jpg" >-->
