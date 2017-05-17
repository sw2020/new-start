<?php
// require_once '../include.php';
function verifyImg($type=1,$length=4,$sess_name='verify',$pixel=20,$line=10){
	session_start();
	//创建画布
	$width=90;
	$height=30;
	$image = imagecreatetruecolor($width, $height);
	$white = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 0, 0, 0);
	//白色填充画布
	imagefilledrectangle($image, 0, 0, $width, $height, $white);
	$chars = verifyString($type,$length);
	$_SESSION[$sess_name] = $chars;  //把字符串赋给名为‘verify’的session
	//添加字体数组
	$fontfiles=array("LATHA.TTF","LATHAB.TTF","PALA.TTF","PALAB.TTF");
	for ($i=0;$i<$length;$i++){
		$size = mt_rand(14, 18);
		$angle = mt_rand(-15, 15);
		$x = 5 + $i*$size;
		$y = mt_rand(20, 26);
		$fontfile = "../font/" . $fontfiles [mt_rand ( 0, count ( $fontfiles ) - 1 )];
		$color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
		$text = substr($chars, $i,1);//每次截取一个字符
		imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);//逐个生成验证码的字符样式
	}
	if ($pixel){
		for ($i=0;$i<$pixel;$i++){
			imagesetpixel($image, mt_rand(0, $width-1), mt_rand(0, $height-1), $black);
		}
	}
	if ($line){
		for ($i=0;$i < $line;$i++){
			$color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
			imageline($image, mt_rand(0, $width-1), mt_rand(0, $height-1),mt_rand(0, $width-1) , mt_rand(0, $height-1), $color);
		}
	}
	header("content-type:image/gif");
	imagegif($image);
	imagedestroy($image);
}

//生成缩略图
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReservedSource=true,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);
	if(is_null($dst_w)||is_null($dst_h)){
		$dst_w=ceil($src_w*$scale);
		$dst_h=ceil($src_h*$scale);
	}
	$mime=image_type_to_mime_type($imagetype);
	$createFun=str_replace("/", "createfrom", $mime);
	$outFun=str_replace("/", null, $mime);
	$src_image=$createFun($filename);
	$dst_image=imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
	if($destination&&!file_exists(dirname($destination))){
		mkdir(dirname($destination),0777,true);
	}
	$dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
	$outFun($dst_image,$dstFilename);
	imagedestroy($src_image);
	imagedestroy($dst_image);
	if(!$isReservedSource){
		unlink($filename);
	}
	return $dstFilename;
}


