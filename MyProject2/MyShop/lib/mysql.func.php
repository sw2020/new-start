<?php
// require_once '../include.php';
//连接数据库
function connect(){
	$link = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_NAME) or die("指定数据库打开失败！");
	mysql_query("set names utf8");
	return $link;
}

//插入数据
function insert($table,$array){
	$key = join(",", array_keys($array));//array_keys()返回数组中的键名
	$vals = "'".join("','", array_values($array))."'";
	$sql = "insert {$table} ($key) values ({$vals})";
// 	var_dump($sql);
	mysql_query($sql);
	return mysql_insert_id();
}

//更新数据
function update($table,$array,$where=null){
	foreach ($array as $key => $val){
		if ($str == null){
			$sep="";
		}else {
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
	$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
//  	var_dump($sql);die();
	$result = mysql_query($sql);
	if ($result){
		return mysql_affected_rows();
	}else {
		return false;
	}
}

//删除记录
function delete($table,$where=null){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysql_query($sql);
	return mysql_affected_rows();
}

//得到一条记录
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result,$result_type);
	return $row;
}

//得到所有记录
function fetchAll($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	while(@$row=mysql_fetch_array($result,$result_type)){
		$rows[]=$row;
	}
	return $rows;
}

//得到结果集中的记录条数
function getResultNum($sql){
	$result=mysql_query($sql);
	return mysql_num_rows($result);
}

//得到上一步插入记录的id号
function getInsertId(){
	return mysql_insert_id();
}












