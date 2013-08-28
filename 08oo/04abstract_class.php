<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
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
	  2.3 接口中所有成员必须有public访问权限. 	  	
 */

//1.1 抽象类
abstract class Person{
	protected $name;
	
	function __construct($name = 'abstract class defaul name.'){
		$this->name = $name;	
	}
	
	function say(){
		echo '<br>1.0'.$this->name;
	}
	
	//抽象方法
	abstract function sayName();
	
	
};

class Student extends Person{
	function sayName(){
		echo "1.0 subclass student name:".$this->name;	
	}
	
}

$abstract1 = new Student("abstract new name");
$abstract1->sayName();

//2.0 接口技术
interface One{
	//2.1接口中只能定义常量 
	const  CONSTANT = 'interface constant';
	const CON = "class visite constant";
	//protected $c ='23';
	
	//接口中只能定义公共方法
	 function func1();
	// function func11();
	
}

//2.2 继承上一个接口
interface Two extends One{
	const CONSTANT2 = 'class constant';
	 function func2();
}

//2.3 实现接口中的方法
//2.4 继承一个类的同时实现多个接口
class Three extends Person implements One, Two{
	//接口中的方法都要实现
	function func1(){
		echo '<br>2.3 实现接口中的方法:'.self::CONSTANT;
		echo '<br>2.3 interface implements类名访问常量:'.Three::CON;		
	}
	
	//php是单继承的,但一个类可以实现多个接口
	function func2(){
		
	}
	
	function sayName(){
		echo "<br> 2.4继承一个类的同时实现多个接口:".$this->name;	
	}
	
}
$interface_implements = new Three();
$interface_implements->func1();
$interface_implements->sayName();








/*
   1. final关键字
	 1.1 final标识的类不能被继承
	 1.2 final 不能标识类成员,标识的类方法不能被继承 
 *
   2. static关键字(静态)
   	 2.1 访问. 
	 	a.类名::静态成员方法名(属性名).
		b.静态方法只能访问静态成员名
	 2.2 selft.	self访问静态方法
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