<?php
header("Content-type:text/html; charset=utf-8");

/*
  三 动态图像处理
  	1.0 GD库的使用
	2.0 画布管理 
		2.1 创建画布
		2.2 释放资源
	
	3.0 设置颜色	
		imagecolorallocate
	
	4.0 生成图像	
		
	5.0 绘制图像	
		5.1 图形区域填充
		5.2 绘制点和线
		
 */
/*//2.0 画布管理 
//2.1 创建画布
$image256 = imagecreate(100, 200); //新建一个基于调色板的图像,基于256色
$imagetrueclor = imagecreatetruecolor(300, 400);//真彩色图像

echo "<br>2.1 真彩色宽".imagesx($imagetrueclor).", 真彩色高".imagesy($imagetrueclor); 
imagedestroy($imagetrueclor);
echo "<br>2.2 新建一个基于调色板的图像,imagecreate:".imagesx($image256); 
echo "<br>2.3 真彩色图像imagecreatetruecolor:".$imagetrueclor; 

//3.0 设置颜色
$image3 = imagecreate(100, 100);
$bg = imagecolorallocate($image3, 255, 0, 0);*/

//4.0 生成图像
/*$image4 = imagecreatetruecolor(40, 50);
$red_bg = imagecolorallocate($image4, 255, 0, 0);
imagefill($image4, 0, 0, $red_bg);
//header("Content-type:image/png");
//imagepng($image4);

if( function_exists("imagepng")  == '22'){
	//header("Content-type:image/png");
	//imagepng($image4);
}else if( function_exists("imagejpeg") ){
	//header("Content-type:image/jpeg");
	//imagejpeg($image4);
}
*/

//4.1 生成图像
/*$image5 = imagecreate(10, 10);
$bg5 =imagecolorallocate($image5, 0, 255, 0);
imagefill($image5, 130, 100, $bg5);

if( function_exists("imagejpeg") ){
	header("Content-type:image/jpeg");
	imagejpeg($image5);
}else if( function_exists("imagegif") ){
	header("Content-type:image/gif");
	imagegif($image5);	
}
imagedestroy($image5);*/

//5.0 绘制图像 
//5.1 图形区域填充
$image6 = imagecreatetruecolor(180, 30);
$bg6 = imagecolorallocate($image6, 255, 0, 0);
//imagefill($image6, 90, 0, $bg6);
imagestring($image6, 5, 15, 8, 'jinwei test', $bg6);

//header("Content-type:image/jpeg");
imagejpeg($image6, 'jinwei.jpg', 75);
imagedestroy($image6);




 
//1.0 GD库的使用 
/*$image = imagecreatetruecolor(20, 20);
$gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
//$gray = imagecolorallocate($image, red, red, red);
imagefill($image, 0, 0, $gray);

//向浏览器输出一个gif格式的图片
header("Content-type:image/png");
imagepng($image);
imagedestroy($image);*/





?>

<div style="text-indent:3em">
<img src="jinwei.jpg">
</div>