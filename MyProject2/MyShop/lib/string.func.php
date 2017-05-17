<?php
//生成验证码
function verifyString($type=1,$length=4){
	if ($type == 1){
		$chars = join("", range(0, 9));
	}elseif ($type == 2){
		$chars = join("", array_merge(range(a, z),range(A, Z)));
	}elseif ($type == 3){
		$chars = join("", array_merge(range(0, 9),range(a, z),range(A, Z)));
	}
	if ($length>strlen($chars)){
		exit("验证码长度不够！");
	}
	$chars = str_shuffle($chars); //随机打乱字符串
	return substr($chars, 0,$length); //从第一位开始截取四位字符
}

//生成唯一字符串
function getUniName(){
	return md5(uniqid(microtime(true),true));	
}
//获取文件的扩展名
function getExt($filename){
	return strtolower(end(explode(".", $filename)));
}
















?>