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
 *访问控制
 
 */

class myClass{
	private $var1 = 111;	
	private function priFunc1(){
		echo $this->var1;	
	}
	
	function __construct($var1='inlialize', $sex="女", $age=15){
		$this->var1 = $var1;
	}
	
	
	private function __get($nam){
		return $this->$nam;	
	}
	
}

class myClass2 extends myClass{
	private $var2 = 222;
	
	function priFunc2(){
		echo "访问控制private:".$this->var1;	 //之所以有值是因为有魔术方法__get
		//$this->priFunc1();//访问出错
	}
}

$my2 = new myClass2();
$my2->priFunc2();


function repeat(){
  echo  'repeat1';	
}
function repeat(){
  echo  'repeat2';	
}
?>



</body>
</html>