<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<script>
//window.attachEvent("onload", function(){alert(11)})

</script>
<?php
/*
 	一. 单列模式 singleton module
		1.1 拥有一个构造函数,标记为private
 		1.2 拥有一个保存类的实例的静态成员变量
		1.3 拥有一个访问这个实例的公共的静态方法
 */
class singleton{
	//声明一个私有的实例变量
	private $name;
	
	//1.1声明私有构造方法为了防止外部代码使用new来创建对象。
	private function __construct($name =12){
		
	}
	
	//1.2 声明一个静态变量（保存在类中唯一的一个实例）
	static $instance;
	
	//1.3 声明一个getinstance()静态方法，用于检测是否有实例对象
	static  function getinstance(){
		if(!self::$instance){
			self::$instance = new self();
			return self::$instance;	
		}
	}
	
	public function getName($name){
		$this->name = $name;
		return $name;
	}
		
} 

//$c = new singleton();
//$c->getName();
$oa = singleton::getinstance();
echo "1.0 单列模式:".$oa->getName("hello name");

class Example{
	// 保存类实例在此属性中
	private static $instance;
	
	// 声明一个private的构造函数， 防止直接创建对象
	private function __construct(){
		echo "<br>1.1 I am constucted.";
	}
	
	//singleton 方法	
	static public  function singleton(){
		if(!isset(self::$instance)){
			$c = __CLASS__;	 //__CLASS__类的名称
			self::$instance = new $c;
		}
		return  self::$instance;		
		
	}
	
	//普通方法
	public function getName(){
		echo "<br>1.2 she seems an unusually clever girl!";	
	}
		
	// 阻止用户复制对象实例
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }


		
}

//会出错
//$test = new Example();
$test = Example::singleton();
$test->getName();
//不能克隆
//$c = clone $test;
//$c->getName();


//2.0 php单列模式
class SingleModule{
	private function __construct(){
		echo "<br>2.1 private的构造函数, 防止直接创建对象.";	
	}
	
	//2.2 保存类实例的静态成员变量
	private static $instance;
	
	//2.3 拥有一个访问这个实例的公共静态方法
	static public function singleMethod(){
		if( !isset(self::$instance) ){
			$class = __CLASS__;
			self::$instance = new $class;
		}
		return self::$instance;
	}
	
	public function simpleMethod(){
		echo "<br>2.4 单列模式普通方法";	
	}
	
	public function __clone(){
		trigger_error("Clone is not allowed.", E_USER_ERROR);
	}
		
}
$sinMod = SingleModule::singleMethod();
$sinMod->simpleMethod();
$cloneSin = clone $sinMod;
$cloneSin->simpleMethod();

$s=2;
echo '<br>3.0:';
var_dump(isset($s));

?>



</body>
</html>