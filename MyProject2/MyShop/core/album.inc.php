<?php
// require_once '../include.php';
function getByIdImg($id){
	$sql="select * from album where Pid = '$id'";
	$row=fetchOne($sql);
	return $row;
}

function getAllImgById(){
	$sql="select * from album where Pid = '$id'";
	$row=fetchall($sql);
	return $rows;
}