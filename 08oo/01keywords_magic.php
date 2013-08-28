<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
/*
   1. final关键字
	 1.1 final标识的类不能被继承
	 1.2 final 不能标识类成员,标识的类方法不能被继承 
 *
   2. static关键字(静态)
   	 2.1 访问. 
	 	a.类名::静态成员方法名(属性名).
		b.静态方法只能访问静态成员名
	 2.2 self.	self访问静态方法
	 2.3 调用。 对象引用和类名::静态成员(方法)名
   
   3. const类常量  	
	  3.1 self访问和类名称访问
	  3.2 不能修改
	  
    4. clone克隆对象
		$p = new Person();  
	 	4.1 clone $p;
	
	5. __toString类中的通用方法
		5.1 必须返回字符串
		5.2 直接输出对象时调用
	
	6. __call方法处理错误调用 	
		6.1 调用不存在的方法时调用此方法
		6.2 第一个参数是调用的方法名,第二参数是参数列表
			$test1->acall('one',  'threee', 444);
		
	7.0 __autoload 自动加载类
		7.1 当调用不存在的类时，自动调用全局函数 function __autoload($className)
	
	8.0 对象串行化 serialize()
		8.1 需要的网络中传输时
		8.2 需要持久保存	
		8.3 对象反串行化unserialize()
		8.4 file_put_contents和file_get_contents
		
		
			
 */

/*
 1.0 抽象方法与抽象类
		//每个类至少有一个共有方法，作为访问他的接口

	  1.1 抽象类 abstract class Person
	  		只要有一个抽象方法就是抽象类
				访问权限不能使用private
			
	  1.2 抽象方法 abstract func1();
	
	2.0 接口技术
	  2.1 接口中只能定义常量 
	  2.2 接口中所有方法都是抽象方法
	  2.3 接口中所有成员必须有public访问权
	  
	  通过类继承接口时使用implement，而不是
	  
	   */

//final class keywords{
//	
//}

 class keywords{
	
}

class keywords_2 extends keywords{
	
}

//define 常量
define("CON", 'hello define boundaries!', true);
echo con;

//static
class static_1{
	static $hel ='static noise';
	private $name = 'static name';
	const CONSTANT = '类常量';
	
	static function sayName(){
		echo "<br>static静态方法:".self::$hel;	
	}
	
	function sayName_c(){
		echo "<br>常规方法:".self::$hel;	
	}
	
	function printConst(){
		echo '<br>3.0'.self::CONSTANT;	
	}
	
	//克隆对象，用于修改属性的值
	function __clone(){
		echo '我是'.self::$hel='修改常量'.'的副本';	
	}
	
}

static_1::$hel = 'static——直接在外部赋值';

echo static_1::$hel;
static_1::sayName();

$stat1 = new static_1();
$stat1->sayName();
$stat1->sayName_c();

$stat1->printConst();
//echo $stat1::CONSTANT; //对象名称访问常量是不允许的

//4.0 克隆对象
$clone = clone $stat1;
$clone->sayName_c();

//5.0 类通用方法__toString()
class testClass{
	private $name;
	
	function __construct($name){
		$this->name = $name;
	}
	
	function __toString(){
		return '<br>'.$this->name;	
	}
	
	function __call($funcName, $args){
		echo '<br>6.0不存在的方法名"'.$funcName.'"参数是:';
		print_r($args);	
	}
	
}
$test1 = new testClass('5.0类中的的__toString');
echo $test1;

//6.0 __call方法处理错误调用
$test1->acall('one',  'threee', 444);

//7.0 __autoload 自动加载类
function __autoload($className){
	include("autoload_".strtolower($className).".php");
}	
$user1 = new User("autoload name");

//8.0 对象串行化 serialize
class Person{
	 private $name;
	 function __construct($name='default name'){
		 $this->nam = $name;	 
	 }	
	 
	 function say(){
		 echo "<br>8.0 对象串行化和对象反串行化,我的名字:".$this->name;
	 }
	 
}

$person1 = new Person("param name");
$serialize = serialize($person1);
file_put_contents("serialize.txt", $serialize);

$person_un = file_get_contents("serialize.txt");
$unserialize = unserialize($person_un);
$unserialize->say();

phpinfo();
?>



 





<p>1</p>
<p>1</p>

<p>1</p>

<script>
var p = document.getElementsByTagName('p');
for(var i=0; i<p.length; i++){
   (function(j){
	   p[j].onclick = function(){
			alert(j)   
	   }
	})(i);
}
</script>

</body>
</html>