<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jinwei
 * Date: 13-7-24
 * Time: 下午2:38
 * To change this template use File | Settings | File Templates.
 */

class FileUpload {
    private $fileField; //保存从$_FILES[$fileField]中获取上传文件信息
    private $filePath; //保存上传文件将被保存的目的路径
    private $errorNum;  //保存系统自定义的错误号，默认值为0
    //是一个数组，用于保存上传文件允许的文件类型（保存文件后缀名数组）
    private $allowType = array("txt", "html", "htm", "jpg", "png", "gif", "css", "js", "php", "doc", "zip", "rar", "exe", "xlsx");

    private $originName;  //保存上传文件的源文件名
    private $tmpFileName; //临时文件名
    private $fileType; //客户端上传的MIME类型
    private $fileSize; //临时文件名
    private $maxSize = 1000000000;  //允许文件上传的最大长度，默认为1M

    private $isCoverModer = false; //是否采用覆盖的方式,默认否
    private $isRandName = false;    //上传文件是否使用随机文件名称
    private $isUserDefinedName = false; //文件上传后，是否采用用户自定义文件名

    private $newFileName;

    function __construct($options = array()){
            $this->setOptions($options);
    }

    public function uploadFile($fileField){
        //为错误位设置初值
        $this->setOption('errorNum', 0);
        $this->setOption("fileField", $fileField);

        $this->setFiles(); //调用成员方法设置文件信息
        $this->checkValid();//判断上传文件是否有效

        //检查保存上传文件的路径是否正确
        $this->checkFilePath();
        //将上传文件设置为新文件名
        $this->setNewFileName();

        if($this->errorNum){
            $this->setOption("errorName", -1);
        }
        return $this->copyFile();

    }

    private function copyFile(){
        $filePath = $this->filePath;
        if($filePath[strlen($filePath) -1] != '/'){
            $filePath .= "/";
        }

        //设置目标的新文件名
        $filePath = $this ->newFileName;

        if(!move_uploaded_file($this->tmpFileName, $filePath)){
            $this->setOption("errorNum", -5);
        }{
//            echo "<h6>上传文件成功</h6>";
        }
        return $this->errorNum;
    }

    //set new file name
    private function  setNewFileName(){
        //如果不允充随机文件名并且不允许用户自定义文件名，则新文件名为上传文件源名
        if($this ->isRandName == false &&  $this->isUserDefinedName == false){
            $this->setOption("newFileName", $this->originName);
        }else{
            $this->setOption("errorName", -4);
            echo "<h6>新文件名设置失败</h6>";
        }
    }

    private function checkFilePath(){
        if(file_exists($this->filePath)){
            if($this->isCoverModer){
                $this->makePath();
            }else{
                $this->setOption("errorNum", -6);//如果不是覆盖模式则设置错误号为-6
                echo "<h6>文件己存在</h6>";
            }
        }
    }

    //判断上传文件是否有效
    private function  checkValid(){
        $this->checkFileSize();
        $this->checkFileType();
    }

    //检查文件大小
    private  function checkFileSize(){
        if($this->fileSize > $this->maxSize){
            echo "<h6>文件过大</h6>";
            $this->setOption("errorNum", -3);
        }
        return $this->errorNum;
    }

    //检查文件类型
    private  function checkFileType(){
        if(!in_array($this->fileType, $this->allowType)){
            //如果不是合法的类型，设置错误号为-2
            $this->setOption("errorNum", -2);
            echo "<h6>上传的文件类型错误</h6>";
        }
        return $this->errorNum;
    }

    //创建保存上传文件的路径
    private  function makePath(){
        if(mkdir($this->filePath, 0755)){
            echo "<h6>创建目录失败</h6>";
            $this->setOption("errorNum", -7);
        }
    }


        private function setOption($key, $value){
        $this->$key = $value;
    }

    /* 从$_FILES数组中取值，赋给对应的成员属性  */
    private function  setFiles(){
        if($this->getFileError() != 0){
            $this->setOption("errorNum", -1);
            return $this->errorNum;
        }

        //调用对象内部函数为保存上传文件源名的成员属性赋值
        $this->setOption("originName", $this->getOriginName());
        $this->setOption("tmpFileName", $this->getTmpFileName());
        $this->setOption("fileType", $this->getFileType());
        $this->setOption("fileSize", $this->getFileSize());

    }

    //得到原文件名
    private function getOriginName(){
        return $this->fileField['name'];
    }

    //得到服务器端临时文件名
    private function getTmpFileName(){
        return $this->fileField['tmp_name'];
    }

    //MIME
    private function getFileType(){
        $str = $this->fileField['name'];
        $splitStr = split("\.", $str);
        //得到上传的文件类型
        $postfix = strtolower($splitStr[count($splitStr) - 1]);
        return $postfix;

    }

    //文件大小
    private function getFileSize(){
        return $this->fileField['size'];
    }

    /*  从全局变量数组$_FILES中获取上传文件的错误标号 */
    private function getFileError(){
        return $this->fileField['error'];
    }

    /* 为成员属性列表赋初值                                                    */
    /* 参数options: 提供一个数组，数组下标为成员属性名称，元素值即为属性设置的值 */
    private function setOptions($options = array()){
        foreach($options as $key => $value){
            //检查数组的下标是否和成员属性同名
            if(!in_array($key, array('filePath'))){
                $this->$key = $value;
            }
        }
    }



}