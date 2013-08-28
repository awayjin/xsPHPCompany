<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
class Person{
	private $name;
	private $age;
	private $sex;
	
	function __construct($name='默认名', $age=1, $sex="女"){
		$this->name = $name;
		$this->age = $age;
		$this->sex = $sex;	
	}
	
	function run(){
		return $this->name.":开始".$this->leftLeg();	
	}
	
	private function leftLeg(){
		return "迈左腿";
	}
	
	public function getAge($sex){
		
	}
	
	public function setSex($sex){
		if($sex == "女" || $sex == '男'){
			return $this->sex = $sex;
		}
	}
	
	public function say(){
		echo "<br>我的名字：".$this->name.", 性别:".$this->sex.", 年龄：".$this->age;
	}
	
	
	
}

$person1 = new Person('jinwei', 15);
echo $person1->run();

echo '<br>';

$person2 = new Person();
echo $person2->run();

$person3 = new Person('3person', '33', "女");
echo $person2->getAge("女");

$person4 = new Person("4per", 25, "男");
$person4->setSex("女");
$person4->say();
?>



</body>
</html>