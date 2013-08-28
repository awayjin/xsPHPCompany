<?php
//矩形
class Rect implements Shape{
	private $width;
	private $height;
	
	function __construct($sides=""){
		$this->width = $sides['width'];
		$this->height = $sides['height'];
	}
	
	//面积
	function area(){
		return $this->width*$this->height;
	}
	
	//周长
	function perimeter(){
		return ($this->width + $this->height)*2;
	}
	
}

?>