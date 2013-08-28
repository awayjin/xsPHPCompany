<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jinwei
 * Date: 13-7-17
 * Time: 下午2:38
 * To change this template use File | Settings | File Templates.
 */
header("Content-type:text/html;charset=utf-8");

isset($_GET["action"]) or die("没有任何操作");

function __autoload($className){
    require $className."_class.php";
}


$fileAction = new FileAction($_GET['fileName'], $_GET['action']);
$fileAction->getFileInfo();

if(isset($_GET['dirName'])){
    $fileAction->getForm("default.php?dirName=".$_GET["dirName"]."");
}