<?php
header("Content-type:text/html; charset=utf-8");

echo "".microtime(true);

class Timer{
	private $starTime;
	private $stopTime;
	
	function __constructor(){
		$this->starTime = 0;
		$this->stopTime = 0;	
	}
	
	public function start(){
		$this->starTime = microtime(true);
	}	
	
	public function stop(){
		$this->stopTime = microtime(true);
	}	
	
	public function spent(){
		return round($this->stopTime - $this->starTime, 4);	
	}
	
}

$timer = new Timer();
$timer->start();

usleep(1000);

$timer->stop();

echo "<br>执行该脚本所运行的时间:".$timer->spent()."秒";


phpinfo();

?>