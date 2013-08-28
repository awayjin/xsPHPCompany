<?php
//定义一个接口
interface Shape{
	//接口中也可以定义常量。接口常量和类常量的使用完全相同。 它们都是定值，不能被子类或子接口修改。 
	
	//面积
	public function area();
	
	//周长
	function perimeter();
	
};

?>