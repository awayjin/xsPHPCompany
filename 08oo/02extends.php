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
 *封装性
 *1. 设置私有成员
 *2. 访问私有成员
 *3. 魔术方法
 *3.1 __set和__get
 *3.2 __isset和__unset
 */

class Person{
	private $name;
	private $sex;
	private $age;
	
	//有构造函数的类会在每次创建新对象时先调用此方法，所以非常适合在使用对象之前做一些初始化工作。 
	function __construct($name='inlialize', $sex="女", $age=15){
		$this->name = $name;
		$this->sex = $sex;
		$this->age = $age;
	}
	
	//在给未定义的变量赋值时，__set() 会被调用
	private function __set($nam, $val){
		if($nam == 'sex'){
			if(!($val == "男" || $val == '女')){
				return;
			}
		}
		
		if($nam == 'age'){
			if($val > 150 || $val < 0){
				return;
			}
		}
		
		$this->$nam = $val;
	}
	
	private function __get($nam){
		if($nam == "sex"){
			//$this->name = "保密";
			return "保密";
		}else if($nam == "age"){
			if($this->age > 30){
				//$this->age = $this->age -10;
				//echo $this->age - 10;
				return $this->age - 10;
			}else{
				return $this->$nam;	
			}
			
		}else{
			return $this->$nam;	
		}
	}
	
	public function say(){
		echo "<br>我的名字:".$this->name.", 性别:".$this->sex.", 年龄:".$this->age;
	}
	
	 function __isset($propName){
		if($propName == "name"){
			return false;
		}else{
			return isset($this->$propName);	
		}
	}
	
	private function __unset($propName){
		if($propName == "name"){ //不允许删除对象中的name
			return;	
		}else{
			unset($this->$propName);
		}
	}
	
}

class Student extends Person{
	var $school;	
	
	function study(){
		echo "<br>".$this->name."在 ".$this->school." 学习";
	}
}

class Teacher extends Student{
	var $wage;
	
	function  teaching(){
		echo "<br>".$this->name."在 ".$this->school." 大学教书, 每月工资:".$this->wage;
	}
	
}

$teacher1 = new Teacher('jan', '男', 50);
$teacher1->say();


$teacher1->school = 'nanjing university';
$teacher1->wage = 3000;

$teacher1->study();
$teacher1->teaching();

?>



</body>
</html>