<?php
require_once '../include.php';
require_once '../lib/common.func.php';
if (!$_COOKIE['adminName2']){
	alertErrorMes("请先登录", "login.php");
}
$val = getProById($id);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-1.11.1.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="js/main.js" ></script>
		<script type="text/javascript" src="js/jquery.validate.js" ></script>
		<script>
			$(function(){
				$('#add_pro_form').validate({
					rules: {
						Pname: {
							required:true,
							minlength:6
						},
						mPrice: {
							required:true,
						},
						iPrice: {
							required:true,
						},
						NewOrOld: {
							required:true,
						},
						address: {
							required:true,
						},
						Pdesc: {
							required:true,
						},
					},
					messages: {
						Pname: {
							required:'请输入商品名称',
							minlength:'商品名称不少于6个字符'
						},
					},
				});
			});

			//下面用于多图片上传预览功能
			 function setImagePreviews(avalue) {
			  var fileObj = document.getElementById("avafile");
			  var preview = document.getElementById("preview");
			  preview.innerHTML = "";
			  var fileList = fileObj.files;
			  for (var i = 0; i < fileList.length; i++) {   
			 
			   preview.innerHTML += "<div style='display:inline-block' > <img id='img" + i + "' /> </div>";
			   var imgObjPreview = document.getElementById("img"+i); 
			   if (fileObj.files && fileObj.files[i]) {
			    //火狐下，直接设img属性
			    imgObjPreview.style.display = 'block';
			    imgObjPreview.style.width = '100px';
			    imgObjPreview.style.height = '100px';
			    //imgObjPreview.src = fileObj.files[0].getAsDataURL();
			    //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
			    imgObjPreview.src = window.URL.createObjectURL(fileObj.files[i]);
			   }
			   else {
			    //IE下，使用滤镜
			    fileObj.select();
			    var imgSrc = document.selection.createRange().text;
			    alert(imgSrc)
			    var localImagId = document.getElementById("img" + i);
			    //必须设置初始大小
			    localImagId.style.width = "100px";
			    localImagId.style.height = "100px";
			   }
			  } 
			 
			  return true;
			 }
		</script>
		<title>二狗网</title>
	</head>
	<body>
		<div class="header" id="top">
			<div class="header-top">
				<div class="container">
					<a href="#">免费注册</a>
					<?php 
					if (!$_COOKIE['adminName2']){
						echo '<a href="login.php">您好，请登录</a>';
					}else {
						echo '<a href="login.php">注销</a>';
					}
					
					?>
					
					<div class="pull-right">
						<a href="shopcar.php"><span class="glyphicon glyphicon-shopping-cart"></span>购物车</a>
						<a href="portrait.php">个人中心</a>
						<a href="contact_us.php">联系我们</a>
					</div>
				</div>
			</div>
			<div class="header-menu">
				<div class="container">
					<div class="col-xs-2"><img alt="" src="img/logo2.png"></div>
					<ul class="col-xs-7">
						<li><a href="index.php">首页</a></li>
						<li><a href="hotSales.php"><?php $where=1;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="hot_Reco.php"><?php $where=2;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a class="active" href="#">发布闲置</a></li>
						<li><a href="contact_us.php">联系我们</a></li>
					</ul>
					<div class="input-group col-xs-3">
						<input type="text" name="" value="" id="search_all" class="form-control" placeholder="搜想要" />
						<div class="input-group-btn">
							<button class="btn btn-diy" id="search_btn" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
			<div class="container" style="min-height: 900px">
				
				<form id="add_pro_form" class="updatePro" action="../core/pro.inc.php?act=frontend_editPro&id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
					
					<P><label>商品名称：</label>
					<input name="Pname" type="text" class="form-control" style="max-width: 550px;margin: 8px 0 15px 0;" placeholder='<?php echo $val['Pname']?>' /></P>
					
					<P><label>商品分类：&nbsp;</label>
					<select name="Cateid">
					<?php $rows=getAllCate(); foreach($rows as $row):?>
						<option value="<?php echo $row['id'];?>"><?php echo $row['cateName'];?></option>
					<?php endforeach;?>
					</select></P>
					<P>
					<label>商品价格：</label>
					<input name="mPrice" type="text" class="form-control" style="max-width: 550px;margin: 8px 0 15px 0;" placeholder='<?php echo $val['mPrice']?>' /></P>
					
					<P><label>商品原价：</label>
					<input name="iPrice" type="text" class="form-control" style="max-width: 550px;margin: 8px 0 15px 0;" placeholder='<?php echo $val['iPrice']?>' /></P>
					<P><label>成色：</label>
					<input name="NewOrOld" type="text" class="form-control" style="max-width: 550px;margin: 8px 0 15px 0;" placeholder='<?php echo  $val['NewOrOld']?>'/></P>
					<P><label>地址：</label>
					<input name="address" type="text" class="form-control" style="max-width: 550px;margin: 8px 0 15px 0;" placeholder='<?php echo $val['address']?>'/></P>
					<P><label>商品描述：</label><br />
					<textarea name="Pdesc" rows="5" cols="76"></textarea> <br /> </P>
					<label>上传图片：</label>
					<div class="fileField" style="max-width:550px;height:50px;banckground-color:#eee;">
						<div id="preview"></div><br />
						<input type="file" name="myFile[]" id="avafile" multiple="multiple"onchange="javascript:setImagePreviews();" /><br />
 						<!--<img src="" id="preview_avator" /><br />-->
 						<button type="submit" class="btn btn-primary">更新</button>
						<button type="button" class="btn btn-default"> 取消</button>
					</div>
					
				</form>

			</div>
			
		<div class="login-footer" id="bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<img src="img/wechat.png" width="120px" height="120px" alt="wechat" />
					</div>
					<div class="col-md-7">
						<p>
							<span>
								© Copyright (C) 2016-2099,成都大学闲置物品交易平台<br/>
								地址：成都市龙泉驿区十陵上街一号 <br />
								邮箱：chengdu.cdu@edu.com   电话:13739499187<br />
								QQ:158555827<br />
								蜀  IP 备  99999号
							</span>
						</p>								
					</div>
				</div>						
			</div>
		</div>	
		<div class="floatPanel">
			<div class="ctrlPanel">
				<a href="#top"><span class="glyphicon glyphicon-chevron-up"></span></a><hr />
				<a href="contact_us.php"><span><img src="img/about.png" />关于</span></a><hr />
				<a><span style="font-size: 13px;"><img src="img/phone-icon.png" alt="" /><br />二维码</span></a><hr />
				<a href="#bottom"><span class="glyphicon glyphicon-chevron-down"></span></a>
			</div>
		</div>
		<div id="QRcode">
			<img src="img/wechat.png" alt="" />
		</div>
	</body>
</html>
