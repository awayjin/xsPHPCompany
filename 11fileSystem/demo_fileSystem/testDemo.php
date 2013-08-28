<?php
/**
 * created by jetbrains phpstorm.
 * user: jinwei
 * date: 13-7-16
 * time: 下午1:37
 * to change this template use file | settings | file templates.
 */
header("content-type:text/html;charset=utf-8");

$path = "e:/test/1.txt";
echo "<br>no suffix:" . basename($path);
echo "<br>need suffix:" . basename($path, ".txt");

function __autoload($classname)
{
    require($classname . "_class.php");
}

//$test1 = new filedir($path);
//$test1->getname();


//1.0 大小写转换 strtoupper
$case = "aba";

echo "<br>1.0:" . strtoupper($case);
echo "<br>1.0:" . strtolower($case);
echo "2.0:" . "e:/test/1.txt/./";

/*
  3.0 检查一个变量是否为空
如果 var 是非空或非零的值，则 empty() 返回 false。
换句话说，""、0、"0"、null、false、array()、var $var;
以及没有任何属性的对象都将被认为是空的，如果 var 为空，则返回 true。
*/
$empty = "";
if (empty($empty)) {
    echo "<br>3.0: " . $empty;
}
//检测变量是否设置
if (isset($empty)) {
    echo "<br>3.1: " . $empty;
}

//4.0 函数参数 数组传递
function arr($options = array(123, 456))
{
    var_dump($options);
    var_dump(is_array($options));
    foreach (@$options as $key => $value) {
        echo '<br>4.0:' . $value;
    }


}

arr(array(78));


//include("../../firephpcore/fb.php");
//require("filedir_class.php");
//fb('aa');

//遍历目录

function travelsal_2()
{
    $dirname = "test";
    $handler = opendir($dirname);
    echo "<table align='center' width='980' border='1'>";
    while ($file = readdir($handler)) {
        $filename = $dirname . "/" . $file;
        echo "<tr>";
        echo "<td>" . $filename . "</td>";
        echo "<td>" . filesize($filename) . "</td>";
        echo "<td>" . filetype($filename) . "</td>";
        echo "<td>" . date("y-m-d h:i:s a", filemtime($filename)) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    closedir($handler);
}

//travelsal_2( );

//phpinfo();

abstract class testabstract
{
    protected $name;
    protected $age;

    function __construct()
    {
        $this->name = "abstract name";
    }

//    abstract function fun1();
}

class test1 extends testabstract
{
    function fun1()
    {
        echo "<br>----" . $this->name;
    }
}

$test1 = new test1();
$test1->fun1();

echo "<hr>";

?>

    <!--<form method='post'  action='test.php?cc=22' enctype='application/x-www-form-urlencoded'>-->
    <form method='post'  action='test.php?cc=22' enctype='multipart/form-data'>
        <input type="hidden" name="dirname" value=".">
        <input type="hidden" name="action" value="upload">
        上传文件:<input type="file" name="upfile">
        <input type="submit" value="上传">
        <a href="default.php?dirname=.">取消</a>
    </form>

<?php
echo "<br>5.0 文件上传enctype";
if(isset($_get['cc'])){
    var_dump($_files['upfile']['name']);
}

//6.0 检测变量是否设置
$varvar = null;
echo "<br>6.0:";
var_dump(isset($var));

//7.0 检查数组中是否存在某个值 in_array()
echo "<br>7.0:";
$valvar = 'testvalue';
$arr = array("testkey"=>'ccaca', "twokey"=> 'testvalue');
$inarrresult = in_array($valvar, $arr);
foreach($arr as $key=>$value){
    if(in_array($valvar, $arr)){
        var_dump($key);
//        continue;
    }

}
var_dump($inarrresult);

//var_dump(in_array($key, $arr));

//8.0
function aa(){
    if(1)
        echo '<br>8.0ca:';
    return 777;
};
echo "<br>8.0:".aa();

//9.0 strlen
echo "<br>";
$strlen = "abcd";
echo "<br>9.0:".$strlen[1];
echo "<br>9.0:".$strlen[strlen($strlen) -1];
echo "<br>9.0:".$strlen."/";
$strlen .= '/';
echo "<br>9.0:".$strlen;

?>

<img src="prototype.jpg"> 