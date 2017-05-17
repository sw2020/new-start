<?php
require_once '../include.php';
require_once '../lib/common.func.php';
$username = $_POST['username'];
$password = $_POST['password'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
// $autoFlag = $_POST['autoFlag'];
$sql = "select * from commonuser where username='{$username}' and password='{$password}'";
login2($sql);
function login2($sql){
	if ($verify == $verify1){
		$row = checkAdmin($sql);
		if ($row){
			setcookie("adminName2",$row['username']);
			setcookie("adminId2",$row['id']);
			setcookie("adminTel",$row['tel']);
			setcookie("adminEmail",$row['email']);
			setcookie("adminRegTime",$row['regTime']);
			header("Location: index.php");
		}else {
			alertErrorMes("登录失败，请重新登录", "login.php");
		}
	}else {
		alertErrorMes("验证码错误，请重新登录", "login.php");
	}
}
