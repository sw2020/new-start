<?php
include_once '../lib/upload.func.php';
include_once '../lib/common.func.php';
include_once 'album.inc.php';
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
$promulgator = $_REQUEST['promulgator'];
if ($act =='addPro') {
	addPro($promulgator);
}elseif ($act=='editPro'){
	$url = "../backend/listPro.php";
	editPro($id,$url);
}elseif ($act=='delPro'){
	$url = "../backend/listPro.php";
	delPro($id,$url);
}elseif ($act=='subOrder'){
// 	$state = getProById($id)['state'];
// 	if ($state=='已售出'){
// 		alertErrorMes("对不起，该商品已售出。", "../frontend/pro/1.php?id={$id}");
// 	}else{
		$pro = getProById($id);
		$order['full_address']=$_POST['full_address'];
		$order['phone']=$_POST['phone'];
		$order['tel']=$_POST['tel'];
		$order['buyer']=$_POST['buyer'];
		$order['proName'] = $pro['Pname'];
		$order['proPrice'] = $pro['mPrice'];
		insert('ordered', $order);
		sub_order($id);
// 	}
	
}elseif ($act=='frontend_delPro'){
	$url = "../frontend/orderForm.php";
	delPro($id,$url);
}elseif ($act=='frontend_editPro'){
	$url = "../frontend/orderForm.php";
	editPro($id, $url);
}

//添加商品
function addPro($promulgator){
	$arr=$_POST;
	$arr['pubTime']=date('Y-m-d H:i:s',time());
	$arr['promulgator'] = $promulgator;
	$path="../uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_340/".$uploadFile['name'],266,340);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$res=insert("shoppro",$arr);
	$pid=getInsertId();
	if($res&&$pid){
		foreach($uploadFiles as $uploadFile){
			$pPath = $uploadFile['name'];
			$sql = "insert album (Pid,albumPath) values ('$pid','$pPath')";
			mysql_query($sql);
		}
		if ($_SERVER['HTTP_REFERER'] == 'http://localhost/MyProject2/MyShop/frontend/updatePro.php'){
// 			alertMes("添加商品成功！", "../frontend/index.php");
			alertSuccessMes("添加商品成功！", "../frontend/index.php");
		}else {
// 			alertMes("添加商品成功！", "../backend/listPro.php");
			alertSuccessMes("添加商品成功！", "../backend/listPro.php");
		}
			
	}else{
		foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_340/".$uploadFile['name'])){
				unlink("../image_340/".$uploadFile['name']);
			}
		}
		if ($_SERVER['HTTP_REFERER'] == 'http://localhost/MyProject2/MyShop/frontend/updatePro.php'){
//			alertMes("添加商品失败！", "../frontend/index.php");
			alertErrorMes("添加商品失败！", "../frontend/index.php");
		}else {
//			alertMes("添加商品失败！", "../backend/listPro.php");
			alertErrorMes("添加商品失败！","../backend/listPro.php");
		}
	}
}
//删除商品
function delPro($id,$url){
	$where="id=$id";
	mysql_query("BEGIN");
	$res=delete("shoppro",$where);
	$proImgs=getAllImgByProId($id);
	if($proImgs&&is_array($proImgs)){
		foreach($proImgs as $proImg){
			if(file_exists("uploads/".$proImg['albumPath'])){
				unlink("uploads/".$proImg['albumPath']);
			}
			if(file_exists("../image_50/".$proImg['albumPath'])){
				unlink("../image_50/".$proImg['albumPath']);
			}
			if(file_exists("../image_220/".$proImg['albumPath'])){
				unlink("../image_220/".$proImg['albumPath']);
			}
			if(file_exists("../image_340/".$proImg['albumPath'])){
				unlink("../image_340/".$proImg['albumPath']);
			}
			if(file_exists("../image_800/".$proImg['albumPath'])){
				unlink("../image_800/".$proImg['albumPath']);
			}
		}
	}
	$where1="Pid={$id}";
	$res1=delete("album",$where1);
	if($res&&$res1){
		mysql_query("COMMIT");
//		alertMes('删除成功', "../backend/listPro.php");
		alertSuccessMes("删除成功！", $url);
	}else{
		mysql_query("ROLLBACK");
//		alertMes('删除失败', "../backend/listPro.php");
		alertErrorMes("删除失败！", $url);
	}
}
//得到所有商品
function getAllPro($sql){
	$rows = fetchAll($sql);
	return $rows;
}
function getAllProbyCateid($cateid){
	$sql = "select * from shoppro where Cateid=$cateid order by rand() limit 4";
	$rows = fetchAll($sql);
	return $rows;
}
//通过商品id获取相关的所有图片
function getAllImgByProId($id){
	$sql="select a.albumPath from album a where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}
//获取商品by ID
function getProById($id){
	$sql = "select * from shoppro where id='{$id}'";
	$row = fetchOne($sql);
	return $row;
}
//获取商品by 分类
function getProByCateId($id){
	$sql = "select * from shoppro where Cateid='{$id}'";
	$rows = fetchAll($sql);
	return $rows;
}
//修改商品信息
function editPro($id,$url){
	$arr = $_POST;
	$path = "../uploads";
	$uploadFiles = uploadFile($path);
	if (is_array($uploadFiles)&&$uploadFiles){
		foreach ($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_340/".$uploadFile['name'],266,340);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="id={$id}";
	$res = update("shoppro", $arr,$where);
	$Pid = $id;
	if ($res&&$Pid){
		if ($uploadFiles&&is_array($uploadFiles)){
			foreach ($uploadFiles as $uploadFile){
				$pPath = $uploadFile['name'];
				$sql = "insert album (Pid,albumPath) values ('$pid','$pPath')";
				mysql_query($sql);
			}
		}
//		alertMes("修改商品成功！", "../backend/listPro.php");
		alertSuccessMes("修改商品成功！", $url);
	}else {
		if(is_array($uploadFiles)&&$uploadFiles){
			foreach($uploadFiles as $uploadFile){
				if(file_exists("../image_800/".$uploadFile['name'])){
					unlink("../image_800/".$uploadFile['name']);
				}
				if(file_exists("../image_50/".$uploadFile['name'])){
					unlink("../image_50/".$uploadFile['name']);
				}
				if(file_exists("../image_220/".$uploadFile['name'])){
					unlink("../image_220/".$uploadFile['name']);
				}
				if(file_exists("../image_340/".$uploadFile['name'])){
					unlink("../image_340/".$uploadFile['name']);
				}
			}
		}
//		alertMes("修改商品失败！", "../backend/listPro.php");
		alertErrorMes("修改商品失败！", $url);
	}
}
function getProNums($sql){
	$num = getResultNum($sql);
	return $num;
}
//订单提交购买
function sub_order($id){
	$arr = array('state'=>'已售出');
	update("shoppro", $arr,"id={$id}");
// 	if (update("shoppro", $arr,"id={$id}")){
// 		alertSuccessMes("订单提交成功，请尽快支付。", "../frontend/pro/1.php");
// 	}else {
// 		alertErrorMes("订单提交失败！", "../frontend/pro/1.php?id={$id}");
// 	}
}
function getOrdered($pname){
	$sql = "select * from ordered where proName='$pname'";
	$row= fetchOne($sql);
	return $row;
}

