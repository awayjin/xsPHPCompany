<?php
//实现形状接口
class Rect implements Shape{
	private $height;
	private $width;
	
	function __construct($sides){
		$this->height =  $sides['height'];
		$this->width = $sides['width'];
	}
	
	
	function area(){
		return $this->height * $this->width;
	}
	
	function perimeter(){
		return ($this->height + $this->width)*2;
	}
	
	
}

?>