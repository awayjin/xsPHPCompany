<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jinwei
 * Date: 13-7-16
 * Time: 下午3:18
 * To change this template use File | Settings | File Templates.
 */
//header("Content-type:text/html;charset=utf-8");

class FileSystem{
    private $path;

    function __construct($path="."){
        $this->path =  $path;
    }

    public function getMenu(){
        $menu = '<a href="control.php?action=upload&dirName='.$this->path.'">上传文件</a>';
        echo $menu;
    }





}

//ctrl+alt+f10 跳转文件至磁盘