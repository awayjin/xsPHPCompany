<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jinwei
 * Date: 13-7-17
 * Time: 下午2:46
 * To change this template use File | Settings | File Templates.
 */

class FileAction {
    private $file;
    private $action;

    function __construct($fileName = "", $action=""){

        if(!empty($action)){
           $this->action = $action;
        }

    }

    public function getFileInfo(){
        if(empty($this->file)){
            echo "<h1>创建新的文件or目录</h1>";
        }
    }



    public function getForm($submitPage){

//        echo "<form method='post'  action='".$submitPage."' enctype='application/x-www-form-urlencoded'>";
        echo '<form method="post"  action="'.$submitPage.'" enctype="multipart/form-data">';

            if(isset($_GET['dirName'])){
                echo '<input type="hidden" name="dirName" value="'.$_GET['dirName'].'">';
            }

            switch($this->action){
                case 'upload':
                    echo '<input type="hidden" name="action" value="upload">';
                    echo '上传文件:<input type="file" name="upfile">';
                    echo '  ';
                    echo '<input type="submit" value="上传">';
                    echo '<a href="'.$submitPage.'">取消</a>';
            }


        echo "</form>";

    }

    public function option(){
        switch($this->action){
            case "upload":
                $tmp = new FileUpload(array('filePath'=>$_POST['dirName']));
                $res = $tmp->uploadFile($_FILES['upfile']);
                break;
        }
    }

}