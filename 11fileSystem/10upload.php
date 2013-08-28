<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jinwei
 * Date: 13-7-4
 * Time: 下午2:46
 * To change this template use File | Settings | File Templates.
 */

//4.0 文件的上传与下载
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

$upfile = "uploadsDir/".time().$_FILES['myfileName']['name'];
if(is_uploaded_file($_FILES['myfileName']['tmp_name'])){
    if(!move_uploaded_file($_FILES['myfileName']['tmp_name'], $upfile)){
        echo "<br>4.3.2".$_FILES['myfileName']['name'];
        exit;
    }
}else{
    echo "<br>4.3上传文件是个非法文件:".$_FILES['myfileName']['name'];
    exit;
}

echo "<br>".$_FILES['myfileName']['name']."文件上传成功,大小为:".($_FILES['myfileName']['size']/1000)."KB";

?>



