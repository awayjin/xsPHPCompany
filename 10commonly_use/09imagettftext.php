<?php
/*
$str1 = "���Ĳ�����";
//$text1 = iconv('GB2312', 'UTF-8//IGNORE', $str1);
$text1 = iconv('UTF-8', 'GB2312', $str1);
echo $text1;
echo "<br>";
echo $str1;
*/


/*
  �� ��̬ͼ����
  	1.0 GD���ʹ��
	2.0 �������� 
		2.1 ��������
		2.2 �ͷ���Դ
	
	3.0 ������ɫ	
		imagecolorallocate
	
	4.0 ����ͼ��	
		
	5.0 ����ͼ��	
		5.1 ͼ���������
		5.2 ���Ƶ���� imagesetpixel imageline
		5.3 ���ƾ��� imagerectangle imagefillrectangle
		5.4 ���ƶ���� imagepolygon imagefillpolygon
		5.5 ������Բ imageellipse
		5.6 ���ƻ��� imagearc
	
	6.0 ��ͼ���л�������
		6.1 ˮƽ�ػ�һ���ַ��� imagestring
		6.2 ��ֱ�ػ�һ���ַ��� imagestringup
		6.3 ˮƽ��һ���ַ� imagechar
		6.4 ��ֱ��һ���ַ� imagecharup
		6.5 ��TrueType ������ͼ��д���ı� imagettftext

		 */


$image = imagecreatetruecolor(300, 300);
$dark = imagecolorallocate($image, 220, 123, 123);
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 5);
imagefill($image, 0, 0, $red);

imagerectangle($image, 0, 0, 300, 100, $dark);
imagefilledrectangle($image, 0, 0, 280, 100, $white );

$text = iconv("gb2312", "utf-8",  "hujinwe�������");
$font= "simsun.ttc";
imagettftext($image, 10, 0, 10, 40, $dark, $font, $text);

header("Content-type:image/png");
imagepng($image);
imagedestroy($image);

/*
//6.0 ��ͼ���л�������
$imagetxt_6 = imagecreate(400, 400);
$image_color6 = imagecolorallocate($imagetxt_6, 205, 255, 255);
$image_red6 = imagecolorallocate($imagetxt_6, 255, 0, 0);
imagefill($imagetxt_6, 0, 0, $image_color6); 

//6.1 ˮƽ�ػ�һ���ַ��� 
//$text = iconv("GB2312", "UTF-8", 'jinľҪwei');
$text = iconv("UTF-8", "GB2312", 'jinľҪwei');
//$text = iconv("GB2312", "UTF-8", $text);
imagestring($imagetxt_6, 6, 30, 30, $text, $image_red6);

//6.2 ��ֱ�ػ�һ���ַ���
imagestringup($imagetxt_6, 4, 260, 160, 'imagestringup', $image_red6);

//6.3 ˮƽ��һ���ַ� imagechar
//6.4 ��ֱ��һ���ַ� imagecharup
$imagechar = "imagechar";
$imagecharLine = "imagechar";
$imagecharColor = imagecolorallocate($imagetxt_6, 0, 255, 0);
$imagecharColor2 = imagecolorallocate($imagetxt_6, 0, 0, 0);
for($i=0, $j=strlen($imagecharLine); $i<strlen($imagecharLine); $i++, $j--){
	imagechar($imagetxt_6, 4, 50+10*($i+1), 50+2*($i+1), $imagecharLine[$i], $imagecharColor);
	imagecharup($imagetxt_6, 5, 80+10*($i+2), 80+2*($i+2), $imagecharLine[$i], $imagecharColor2);
}

//6.5 ��TrueType ������ͼ��д���ı�
$test65 = iconv("gb2312", "utf-8", "aaa�й���");
$font65 = "simsun.ttc";
imagettftext($imagetxt_6, 20, 0, 200, 150, $image_red6, $font65, $text65);



header("Content-type:image/jpeg");
imagejpeg($imagetxt_6, "", 160);


*/







 
/*
//5.2 ���Ƶ����
$image7 = imagecreate(500, 400);
$dark7 = imagecolorallocate($image7, 222, 222, 222);
$red7 = imagecolorallocate($image7, 222, 0, 0);

imagefill($image7, 0, 0, $dark7);
//���Ƶ�
imagesetpixel($image7, 20, 30, $red7);
//������

//5.3 ���ƾ���
$blue7 = imagecolorallocate($image7, 0, 0, 255);
imagerectangle($image7, 30, 80, 130, 180, $blue7);
imagefilledrectangle($image7, 40, 90, 130, 170, $red7);

//5.4 ���ƶ����
$green7 = imagecolorallocate($image7, 0, 255, 0);
imagepolygon($image7,
	array(
		0, 0,
		30, 100,
		120, 120,
		150, 120
	), 4, $green7);

imageline($image7, 0, 0, 100, 100, $red7);

//5.5 ������Բ imageellipse
imageellipse($image7, 220, 130, 100, 120, $blue7);

//5.6 ���ƻ��� imagearc
imagearc($image7, 300, 200, 30, 50, 120, 300, $green7);
//imagefilledarc($image7, 300, 200, 30, 50, 0, 300, $blue7);

header("Content-type:image/jpeg");
imagejpeg($image7, "", 280);
imagedestroy($image7);


*/ 


 
 
/*//2.0 �������� 
//2.1 ��������
$image256 = imagecreate(100, 200); //�½�һ�����ڵ�ɫ���ͼ��,����256ɫ
$imagetrueclor = imagecreatetruecolor(300, 400);//���ɫͼ��

echo "<br>2.1 ���ɫ��".imagesx($imagetrueclor).", ���ɫ��".imagesy($imagetrueclor); 
imagedestroy($imagetrueclor);
echo "<br>2.2 �½�һ�����ڵ�ɫ���ͼ��,imagecreate:".imagesx($image256); 
echo "<br>2.3 ���ɫͼ��imagecreatetruecolor:".$imagetrueclor; 

//3.0 ������ɫ
$image3 = imagecreate(100, 100);
$bg = imagecolorallocate($image3, 255, 0, 0);*/

//4.0 ����ͼ��
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

//4.1 ����ͼ��
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

//5.0 ����ͼ�� 
//5.1 ͼ���������
/*
$image6 = imagecreatetruecolor(180, 30);
$bg6 = imagecolorallocate($image6, 255, 0, 0);
//imagefill($image6, 90, 0, $bg6);
imagestring($image6, 5, 15, 8, 'jinwei test', $bg6);

//header("Content-type:image/jpeg");
imagejpeg($image6, 'jinwei.jpg', 75);
imagedestroy($image6);
*/



 
//1.0 GD���ʹ�� 
/*$image = imagecreatetruecolor(20, 20);
$gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
//$gray = imagecolorallocate($image, red, red, red);
imagefill($image, 0, 0, $gray);

//����������һ��gif��ʽ��ͼƬ
header("Content-type:image/png");
imagepng($image);
imagedestroy($image);*/





?>

<script>
for(var i=0, j=3; i<3; i++, j--){
	console.log(i+ ", j:" + 3);
}
</script>

<div style="text-indent:3em">
<!--<img src="jinwei.jpg">-->
</div>