<?php
//三角形
class Rect implements Shape{
	private $side1;
	private $side2;
	private $side3;
	
	function __construct($sides=""){
		$this->side1 = $sides['side1'];
		$this->side2 = $sides['side2'];
		$this->side3 = $sides['side3'];
	}
	
	//面积
	function area(){
	   $s=($this->side1+$this->side2+$this->side3)/2;
	   return sqrt( $s*($s - $this->side1)*($s - $this->side2)*($s - $this->side3) );  //返回三角形的面积
	}
	
	//周长
	function perimeter(){
		return  $this->side1+$this->side2+$this->side3;        //返回三角形的周长
	}
	
}

?>