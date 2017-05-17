<?php
 include_once '../include.php';
 include_once '../lib/common.func.php';
 include_once 'pro.inc.php';
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
if ($act=='logout') {
	logout();
} 
elseif ($act=='addAdmin') 
{
	 addAdmin();
} 
elseif ($act=='editAdmin') 
{
	 editAdmin($id);
} 
elseif ($act=='delAdmin') 
{
	 delAdmin($id);
} 
elseif ($act=='resetPassword')
{
	resetPassword();
}

//检查用户是否存在
function checkAdmin($sql){
	return  fetchOne($sql);
}
//检查用户是否登录
function checkLogined(){
	if ($_SESSION['adminId']==null && $_COOKIE['adminId']==null){
// 		alertMes("请先登陆","login.php");
		alertErrorMes("请先登录！", "login.php");
	}
}
//注销
function logout() {
	header("location:../backend/login.php");
}
//添加管理员用户
function addAdmin(){
	$arr = $_POST;
	$arr['regTime']=date('Y-m-d H:i:s',time());
	if (insert("user", $arr)){
// 		alertMes("添加成功！", "../backend/listAdmin.php");
		alertSuccessMes("操作成功！", "../backend/listAdmin.php");
	}else {
// 		alertMes("error!添加失败！", "../backend/listAdmin.php");
		alertErrorMes("添加失败！", "../backend/listAdmin.php");
	}
}
//获取全部管理员用户
function getAllAdmin(){
	$sql = "select * from user";
	$rows = fetchAll($sql);
	return $rows;
}

//更新管理员信息
function editAdmin($id){
	$arr = $_POST;
	$arr['updateTime']=date('Y-m-d H:i:s',time());
	if (update("user", $arr, "id={$id}")){
// 		alertMes("修改成功！", "../backend/listAdmin.php");
		alertSuccessMes("操作成功！", "../backend/listAdmin.php");
	}else {
// 		alertMes("修改失败！", "../backend/listAdmin.php");
		alertErrorMes("修改失败！", "../backend/listAdmin.php");
	}
}
//删除管理员
 function delAdmin($id){
 	if (delete("user","id={$id}")){
//  		alertMes("删除成功！", "../backend/listAdmin.php");
 		alertSuccessMes("操作成功！", "../backend/listAdmin.php");
 	}else {
//  		alertMes("删除失败！", "../backend/listAdmin.php");
		alertErrorMes("操作失败！", "../backend/listAdmin.php");
 	}
 }
 
 //重置密码
function resetPassword(){
	$arr = $_POST;
	$sql = "select * from user where username='{$_SESSION['adminName']}' and password='{$arr["password"]}'";
	$row = checkAdmin($sql);
	if ($row){
		$sql="update user set password='".$arr['pass']."' where username='".$_SESSION['adminName']."'";
		mysql_query($sql);
// 		alertMes("密码修改成功,请重新登录!", "../backend/login.php");
		alertSuccessMes("操作成功,请重新登录！", "../backend/login.php");
	}else {
// 		alertMes('原密码输入错误！','../backend/resetPassword.php');
		alertErrorMes("操作失败！", "../backend/reserPassword.php");
	}
}





