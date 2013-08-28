<?php
header("Content-type:text/html; charset=utf-8");
/*1. 对象关键词
	1.1 static
	 对象引用访问静态方法
	 类名访问静态方法
	 c. 类常量 
 *
  2.0 反射类 RelectionClass
   
  3.0 扩展内置异常处理类 
		  
 */
 
//3.0 异常处理类 
//$exception = new Exception();
//echo $exception;
class myException extends Exception{
	
	//重新定义构造器,使message变为必须被指定的属性
	public function __construct($message, $code=0){
		//检查所有变量是否已经赋值
		parent::__construct($message, $code);	
	}
	
	function __toString(){
		//__CLASSS__类的名称
		return '3.0异常处理类, 类名:'.__CLASS__.":[".$this->code."],".$this->message."<br>";
	}
	
	public function printFunc(){
		echo "<br>自定义处理方法异常类";
	}
		
}
$myexcpt1= new myException("cccccc");
//$myexcpt1->printFunc();
//echo $myexcpt1;

try{
	$error2 = "test error";
	throw new myException($error2); 
}catch(myException $ec){
	echo "3.1 捕获异常:".$ec;
	//$ec->printFunc();
	
}

//3.2 捕获多个异常
//创建一个用于测试自定义扩展的异常类
class TestException{
	public $var;
	function __construct($value=100){
		switch($value){
			case 5:
				throw new myException("传入的值“1”是一个无效的参数", 5);	
				break;
			case 6:
				throw new Exception("传入的值“2”不允许作为一个参数", 6);	
				break;
			default:	
				$this->var = $value;
				break;
		}
	}
	
}

try{
	//正常执行
	$testObj = new TestException();
	echo "********<hr>";
		
}catch(myException $e5){
	echo $e5;
}
var_dump($testObj);

try{
	//抛出内置的异常
	$testObj2 = new TestException(5);
	echo "********<br>"; //不会执行
		
}catch(myException $e5){
	echo "<br>3.3捕获自定义的异常:".$e5;
}catch(Exception $e){
	echo "<br>3.4捕获默认的异常".$e->getMessage();
}

var_dump($testObj2);

try{
	//抛出内置的异常
	$testObj3 = new TestException(6);
	echo "********<br>"; //不会执行
		
}catch(myException $e5){
	echo "<br>3.3捕获自定义的异常:".$e5;
}catch(Exception $e){
	echo "<br>3.4捕获默认的异常:".$e->getMessage();
}

var_dump($testObj3);


echo "<hr>";
//10.1.1 错误类型和基本的调试
ini_set("display_errors", 1);
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(E_ALL);
//var_dump(cccc);
// E_ALL & ~E_NOTICE
echo "<hr>";

class myClass{
	public $one = '';
    public $two = '';
	const CONSTANT = '类常量';
	
	static $forCons=40;
	function __construct(){
		self::$forCons++;
	}
	
	static $threeStatic = "静态方法";
	static function static_three(){
		//成员方法中推荐self访问静态成员
		echo "<br>静态成员方法:".self::$threeStatic;
	}	
	
	function getCount(){
		return self::$forCons;	
	}
	
}

//1.1 可以给静态成员赋值
myClass::$forCons = 3;
$cons = new myClass();
echo "<br>输出类常量:".myClass::CONSTANT;

$myc1 = new myClass();
//对象引用访问静态方法
$myc1->static_three();
//类名访问静态方法
myClass::static_three();
$myc2 = new myClass();

echo "<br>construct static:".$myc2->getCount();

//2.0 反射类 ReflectionClass
$reflection = new ReflectionClass("Exception");	
echo "<pre>".$reflection."</pre>";



?>