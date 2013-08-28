<?php

class validationCode{
	private $width;
	private $height;
	private $codeNum;	
	private $checkCode; //验证码字符
	private $image; //画布

	public function __construct($width=100, $height=30, $codeNum=4){
		$this->width = $width;
		$this->height = $height;
		$this->codeNum = $codeNum;
		$this->checkCode = $this->createCheckCode();
	}
	
	//得到验证码
	public function getCode(){
		return $this->checkCode;
	}
	
	
	//1.0 生成验证码字符
	private function createCheckCode(){
		for($i=0; $i<$this->codeNum; $i++){
		    $num = rand(0,2);
			switch($num){
				case 0:
					$rand_num = rand(48, 57);
					break;
				case 1;
					$rand_num =rand(65, 80);
					break;
				case 2:
					$rand_num = rand(97, 122);	
					break;	
			}	
			//%c 解释为整数并做为字符输出
			$ascii_num = sprintf("%c", $rand_num);
			$ascii = $ascii.$ascii_num;
			
		}
		return $ascii;
	}
	
	//2.0 输出图像
	public function showImage(){
		//创建图像，并初始化背景
		$this->getCreateImage();
		
		//输出随机文字颜色，随机文字、随机位置
		$this->outputText();
	
		//设置一些干扰素
		$this->setDisturb();
	
		//生成相应的格式并输出
		$this->outputImage();
		
		
		
	}
	
	//3.0 创建图像资源,并初始化背景和图像边框
	private function getCreateImage(){
		$this->image = imagecreate($this->width, $this->height);
		$bg_white = imagecolorallocate($this->image, 255, 255, 255);
		$border_black  = imagecolorallocate($this->image, 0, 0, 0);
		imagerectangle($this->image, 0, 0, $this->width - 1, $this->height - 1, $border_black);	
	} 
	
	//4.0 输出随机文字、随机文字颜色、随机位置
	private function outputText(){
		$cc = 'abcd';
		for($i=0; $i<$this->codeNum; $i++){
			fb($cc[$i]);
			$x = floor($this->width/$this->codeNum)+9*$i;
			//$y = rand(0, $this->height-20 );
			$y = $this->height-5;
			//$x = floor($this->width/$this->codeNum)*$i+3;
   			//$y = rand(0,$this->height-15);
			
			$font = 'simsun.ttc';
			$rand_color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
			//imagechar($this->image, 5, $x, $y, strtoupper($this->checkCode[$i]), $rand_color);
			imagettftext($this->image, 18, 0, $x, $y, $rand_color, $font, strtoupper($this->checkCode[$i]));

		}
	
	}
	
	//5.0 设置干扰素
	private function setDisturb(){
		for($i=0; $i<100; $i++){
			$color_disturb =imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255) );
			imagesetpixel($this->image, rand(1, $this->width-2), rand(1, $this->height-2), $color_disturb);
		}	
	}
	

	

	
	
	
	private function outputImage(){
		header("Content-type:image/gif");
		imagegif($this->image);	
	}
	
    function __destruct(){
		echo ''.$this->checkCode;
		imagedestroy($this->image);	
	}
	
			
}

//getCreateImage();
function getCreateImage(){
	//需要imagefill填充背景
	//$image = imagecreatetruecolor(100, 30);
	$image = imagecreate(100, 30);
	$bg = imagecolorallocate($image, 255, 0, 0);
	$border = imagecolorallocate($image, 0, 0, 255);
	//imagefill($image, 0, 0, $bg);
	//imagerectangle($image, 0, 0, 100 -1, 30 -1, $border);
	imageline($image, 0, 0, 100-1, 30-1, $border);
	//imagefill
	header("Content-type:image/jpeg");
	imagejpeg($image, "", 100);
	//imagegif($image);
	imagedestroy($image);	
} 


function createCheckCode(){
		for($i=0; $i<4; $i++){
		    $num = rand(0,2);
			switch($num){
				case 0:
					$rand_num = rand(48, 57);
					break;
				case 1;
					$rand_num =rand(65, 80);
					break;
				case 2:
					$rand_num = rand(97, 122);	
					break;	
			}	
			$ascii = sprintf("%c", $rand_num);
			$ascii_number = $ascii_number.$ascii;
			
		}
		return $ascii_number;
}
	
//echo "<br>全转换为大写:".strtoupper(createCheckCode());
//echo "<br>全转换为小写:".strtolower(createCheckCode());
/*
//%c 解释为整数并做为字符输出
$rand_number = sprintf("%c", rand(48, 57));
echo "<br>1.0随机整数:".$rand_number;
$rand_caps = sprintf("%c", rand(65, 80));
echo "<br>1.3随机大写字母:".$rand_caps;
$rand_caps2 = sprintf("%c", rand(97, 122));
echo "<br>1.3随机小写字母:".$rand_caps2;
*/


     /* 类ValidationCode声明在文件名为Validationcode.php中    */
     /* 通过该类的对象可以动态获取验证码图片，和验证码字符串 */
	class ValidationCode2 {
		private $width;
		private $height;
		private $codeNum; //字符数
		private $image; //画布
		private $checkCode; //验证码字符
		
		public function __construct($width=100, $height=30, $codeNum=4){
			$this->width = $width;
			$this->height = $height;
			$this->codeNum = $codeNum;
			$this->checkCode = $this->createCheckCode();
		}
		
		//1.0 输出图像
		public function showImage(){
			//用来创建图像资源, 并初始化背景
			$this->getCreateImage();
			//随机颜色、随机摆放 随机字符串向图像中输出
			$this->outputText();
			//干扰素
			$this->setDisturbColor();
			//生成相应的格式并输出
			$this->outputImage();
		}
	
		function getCheckCode(){                     //访问该方法获取随机创建的验证码字符串
			return $this->checkCode;                 //返回成员属性$checkCode保存的字符串
		}
		
		//2.0 用来创建图像资源, 并初始化背景
		private function getCreateImage(){
				$this->image = imagecreate($this->width, $this->height);
				$back=imageColorAllocate($this->image, 255, 255, 255);
				$border=imageColorAllocate($this->image, 0, 0, 0);
				imageRectangle($this->image,0,0,$this->width-1,$this->height-1,$border);
	
		}
		
		//3.0 随机颜色、随机摆放 随机字符串向图像中输出
	private function outputText(){
		for($i=0; $i<=$this->codeNum; $i++){
			$bg_color = imagecolorallocate($this->image, rand(0, 255), rand(0, 128), rand(0, 255));
			//$x = floor( ($this->width/$this->height)*$i + 3);
			//$y = rand(0, $this->height - 15);
			$x = floor($this->width/$this->codeNum)*$i+3;
   			$y = rand(0,$this->height-15);
			//水平地画一个字符
			imagechar($this->image, 5, $x, $y, $this->checkCode[$i], $bg_color);
		}
	}
//4.0 随机生成指定个数的字符串
	private function createCheckCode(){
		for($i=0; $i < $this->codeNum; $i++){
			$number = rand(0, 2);
			switch($number){
				case 0:
					//随机生成一个数字
					$rand_number = rand(48, 57);
					break;
				case 1:
					//随机生成一个小写字母
					$rand_number = rand(97, 122);	
					break;
				case 2:
					//随机生成一个大写字母
					$rand_number = rand(65, 80);	
					break;	
			}
			$ascii = sprintf("%c", $rand_number);
			$ascii_number = $ascii_number.$ascii;
		}
		return $ascii_number;
		
	}	
		
//5.0 设置一些干扰素
	private function setDisturbColor(){
		imagesetpixel($this->image, $x, $y, $bg_color);
		for($i=0; $i<=100; $i++){
			$color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
			imagesetpixel($this->image, rand(1, $this->width - 2), rand(1, $this->height -2), $color);
		}
	}
	
	
		//6.0 自动检测GD库支持的类型，并输出图像
	private function outputImage(){
			if(imagetypes() & IMG_GIF){          //判断生成GIF格式图像的函数是否存在
				header("Content-type: image/gif");  //发送标头信息设置MIME类型为image/gif
				imagegif($this->image);           //以GIF格式将图像输出到浏览器
			}elseif(imagetypes() & IMG_JPG){      //判断生成JPG格式图像的函数是否存在
				header("Content-type: image/jpeg"); //发送标头信息设置MIME类型为image/jpeg
				imagejpeg($this->image, "", 0.5);   //以JPEN格式将图像输出到浏览器
			}elseif(imagetypes() & IMG_PNG){     //判断生成PNG格式图像的函数是否存在
				header("Content-type: image/png");  //发送标头信息设置MIME类型为image/png
				imagepng($this->image);          //以PNG格式将图像输出到浏览器
			}elseif(imagetypes() & IMG_WBMP){   //判断生成WBMP格式图像的函数是否存在
				 header("Content-type: image/vnd.wap.wbmp");   //发送标头为image/wbmp
				 imagewbmp($this->image);       //以WBMP格式将图像输出到浏览器
			}else{                              //如果没有支持的图像类型
				die("PHP不支持图像创建！");    //不输出图像，输出一错误消息，并退出程序
			}	
	}
	

		
		function __destruct(){                      //当对象结束之前销毁图像资源释放内存
 			imagedestroy($this->image);            //调用GD库中的方法销毁图像资源
		}
	}
?>
