<?php
abstract class FileDir{
    protected $name;
    protected $basename;
    protected $type;
    protected $size;
    protected $ctime; //文件创建时间
    protected $mtime; //文件修改时间
    protected $atime; //file访问时间
    protected $visit;  //文件或目录访问或被访问的权限
    public  $test;
//    private $test2; //抽象类不能用private

    function __construct(){

    }

    function getName(){

    }

}

class Person{
    private $name;
}
?>

<?php

////每个类至少有一个共有方法，作为访问他的接口
//abstract class  FileDir{
//    abstract function testAbstract(); //抽象方法
//}
//
//interface interfaceClass1{
//    const CONS = "class constant variable";
//    function fun1();
//}
//echo "接口interface:".interfaceClass1::CONS;
//
////接口之前的扩展
//interface Two extends interfaceClass1{
//    function fun2(); //抽象方法
//}
//
//class Person{
//
//}
//
////一个类实现多个接口
//class Three extends Person implements interfaceClass1, Two{
//
//    function fun1(){
//        echo "<br>类继承接口时需要使用implements:".Three::CONS;
//    }
//    function fun2(){
//        echo '类继承接口时需要使用implements';
//    }
//
//
//    function func1()
//    {
//        // TODO: Implement func1() method.
//    }
//
//    function func2()
//    {
//        // TODO: Implement func2() method.
//    }
//}
//$iThree = new Three();
//$iThree->fun1();
//
//
////phpinfo();

?>