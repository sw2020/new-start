<?php
//function alertMes($mes,$url){
//	echo "<script>alert('{$mes}');</script>";
//	echo "<script>window.location='{$url}';</script>";
//}

function alertSuccessMes($mes,$url){
	echo "<script>_success('$mes','$url')</script>";
}

function alertErrorMes($mes,$url){
	echo "<script>_error('$mes','$url')</script>";
}

//分页
function getRowsByPage($page,$pageSize=2,$table,$where){
	$sql="select * from {$table} {$where}";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from {$table} {$where} limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <title>二手交易平台</title>
    <link rel="stylesheet" href="../frontend/css/zeroModal.css" />
    <link rel="stylesheet" href="../frontend/css/style.css" />
    <script type="text/javascript" src="../frontend/js/jquery.min.js" ></script>
    <script type="text/javascript" src="../frontend/js/zeroModal.min.js" ></script>
    <script>
    	function _success(content,url) {
	        zeroModal.success({
	            content: content,
	            okFn: function() {
	                window.location=url;
	            }
	        });
	    }
	    function _error(content,url) {
	        zeroModal.error({
	            content: content,
	            okFn: function() {
	                window.location=url;
	            }
	        });
	    }
	    function _custombutton() {
	        zeroModal.show({
	            title: '百度一下',
	            iframe: true,
	            url: 'http://map.baidu.com/',
	            width: '60%',
	            height: '60%',
	        });
	    }
    </script>
</head>
<body>
</body>
</html>