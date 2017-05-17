<?php
require_once '../include.php';
require_once '../lib/common.func.php';
$username = $_POST['username'];
$password = $_POST['password'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
$autoFlag = $_POST['autoFlag'];
$sql = "select * from user where username='{$username}' and password='{$password}'";
login($sql);
//登录
function login($sql){
	if ($verify == $verify1){
		$row = checkAdmin($sql);
		if ($row){
			if ($autoFlag){
				setcookie("adminId",$row['id'],time()+7*24*3600);
				setcookie("adminName",$row['username'],time()+7*24*3600);
			}
			$_SESSION['adminName']=$row['username'];
			$_SESSION['adminId']=$row['id'];
			header("Location: index.php");
		}else {
// 			alertMes("登录失败，请重新登录", "login.php");
			alertErrorMes('登录失败，请重新登录！', "login.php");
		}
	}else {
		alertErrorMes('验证码错误，请重新登录！', "login.php");
	}
}