<?php
include_once '../include.php';
include_once '../lib/common.func.php';
include_once '../lib/upload.func.php';
$act = $_REQUEST['act'];
$user = $_REQUEST['user'];
$id = $_REQUEST['id'];
if ($act == 'reg') {
	reg();
}elseif ($act == 'setAvator'){
	setAvator($user);
}elseif ($act == 'edit'){
	editUser($id);
}

function reg(){
	$flag = $_POST['regFlag'];
	if ($flag) {
		$arr['username'] = $_POST['username'];
		$arr['password'] = $_POST['password'];
		$arr['email'] = $_POST['email'];
		$arr['tel'] = $_POST['tel'];
		$arr['QQ'] = $_POST['QQ'];
		$arr['sex'] =$_POST['sex'];
		$arr['regTime']=date('Y-m-d H:i:s',time());
		var_dump($arr);die();
		if (insert("commonuser", $arr)) {
//			echo "<script>var content='恭喜你，注册成功!',url='../frontend/login.php';_success(content,url)</script>";
			alertSuccessMes("恭喜你，注册成功！", "../frontend/login.php");
		}else {
			alertErrorMes("对不起，注册失败！", "../frontend/login.php");
		}
	} else {
		alertErrorMes("请先阅读相关声明！", "../frontend/login.php");
	}

}

function getUser($sql){
	$row = fetchOne($sql);
	return $row;
}

//修改头像
function setAvator($user){
	if (!$user){
		echo "<script>var content='请先登录!',url='../frontend/login.php';_error(content,url)</script>";
	}else {
		$path = "../avator";
		$avator = uploadFile($path);
		$avaname = $avator[0]['name'];
		//获取上一个头像的名字
		$sql = "select * from commonuser where username='$user'";
		$userRow = getUser($sql);
		$preAvaName = $userRow['face'];
		unlink("../avator/".$preAvaName);//删除之前的头像
 		//$sql = "update commonuser set face='$avaname' where username='$user'";
 		$arr = array(face=>$avaname);
		if(update("commonuser", $arr,"username='$user'")){
			alertSuccessMes('恭喜你，修改成功！', '../frontend/index.php');
		}else{
			alertErrorMes("对不起，修改失败！", "../frontend/index.php");
		}
	}
	
}

//根据用户名找到用户
function getUserByName($where){
	$sql = "select * from commonuser where username='$where'";
	$row = fetchOne($sql);
	return $row;
}
// 修改用户信息
function editUser($id){
	$arr['username'] = $_POST['username'];
	$arr['password'] = $_POST['password'];
	$arr['email'] = $_POST['email'];
	$arr['tel'] = $_POST['tel'];
	$arr['QQ'] = $_POST['QQ'];
	$arr['sex'] =$_POST['sex'];
	if (update("commonuser", $arr,"id={$id}")){
		alertSuccessMes("操作成功,请重新登录！", "../frontend/login.php");
	}else {
		alertErrorMes("操作失败！", "../frontend/portrait.php");
	}
}




