<?php
 include_once '../include.php';
 include_once '../lib/common.func.php';
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];

if ($act=='addCate') 
{
	 addCate();
} 
elseif ($act=='editCate') 
{
	 editCate($id);
} 
elseif ($act=='delCate') 
{
	 delCate($id);
}
//添加分类
function addCate(){
	$arr = $_POST;
	$arr['creatTime']=date('Y-m-d H:i:s',time());
	if (insert('cate', $arr)){
// 		alertMes("添加成功！", "../backend/listCate.php");
		alertSuccessMes("操作成功！", "../backend/listCate.php");
	}else {
// 		alertMes("添加失败！", "../backend/listCate.php");
		alertErrorMes("操作失败！", "../backend/listCate.php");
	}
}
//修改分类
function editCate($id){
	$arr = $_POST;
	$arr['updateTime']=date('Y-m-d H:i:s',time());
	if (update("cate", $arr, "id={$id}")){
// 		alertMes("修改成功！","../backend/listCate.php");
		alertSuccessMes("操作成功！", "../backend/listCate.php");
	}else {
// 		alertMes("修改失败，请重新修改！", "../backend/editCate.php?id=$id");
		alertErrorMes("操作失败！", "../backend/editCate.php?id=$id");
	}
}
//删除分类
function delCate($id){
	if (delete("cate","id={$id}")){
// 		alertMes("删除成功，查看分类列表！","../backend/listCate.php");
		alertSuccessMes("操作成功！", "../backend/listCate.php");
	}else {
// 		alertMes("删除失败，请重新删除！","../backend/listCate.php");
		alertErrorMes("操作失败！", "../backend/listCate.php");
	}
}
//得到所有的分类
function getAllCate(){
	$sql="select * from cate";
	$rows = fetchAll($sql);
	return $rows;
}
function getOneCate($where){
	$sql="select * from cate where id = '$where'";
	$row = fetchOne($sql);
	return $row;
}
function getAllCateName(){
	$sql = "select cateName from cate";
	$cateNames = fetchAll($sql);
	return $cateNames;
}

?>