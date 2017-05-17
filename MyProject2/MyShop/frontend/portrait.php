<?php 
require_once '../include.php';
require_once '../core/user.inc.php';
if (!$_COOKIE['adminName2']){
// 	alertMes("请先登录", "login.php");
	alertErrorMes("请先登录！", "login.php");
}
$where = $_COOKIE['adminName2'];
if (isset($where)){
	$ava = getUserByName($where)['face'];
}
$user = getUserByName($_COOKIE['adminName2']);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>商品介绍</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="js/main.js" ></script>
		<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
		<script>
			$(function(){
				$('#user_reg_form').validate({
					rules: {
						username: "required",
						password: {
							required:true,
							rangelength:[6,16]
						},
						repassword: {
							required:true,
							equalTo: "#password"
						},
						tel: {
							required:true,
							minlength:11
						},
						email: {
							required:true,
							email:true,
						},	
						QQ: {
							required:true
						}
					},
					messages: {
						username: '请输入用户名',
						password: {
							required:'请输入密码',
							rangelength:'请输入6-16位字符串密码'
						},
						repassword: {
							required:'请确认密码',
							equalTo:'两次密码不一致'
						},
						tel: {
							required:'请输入电话号码',
							minlength:'请输入正确的11位电话号码',
						},
						email: {
							required:'请输入您的邮箱',
							email:'请输入正确的邮箱地址',
						},
						QQ: {
							required:'请输入您的QQ号码',
						}
					}
				});	
			});
			
		</script>
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
						<a href="#">个人中心</a>
						<a href="contact_us.php">联系我们</a>
					</div>
				</div>
			</div>
			<div class="header-menu">
				<div class="container">
					<div class="col-xs-2"><img alt="" src="../frontend/img/logo2.png"></div>
					<ul class="col-xs-7">
						<li><a href="index.php">首页</a></li>
						<li><a href="hotSales.php"><?php $where=1;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="hot_Reco.php"><?php $where=2;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="updatePro.php">发布闲置</a></li>
						<li><a href="contact_us.php">联系我们</a></li>
					</ul>
					<div class="input-group col-md-3">
						<input type="text" name="" value="" id="search_all" class="form-control" placeholder="搜想要" />
						<div class="input-group-btn">
							<button class="btn btn-diy" id="search_btn" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="container">
		<ul class="up-position">
			<li><span class="glyphicon glyphicon-home"></span> <a href="index.php">首页 &nbsp;</a></li>
			<li>个人中心</li>
		</ul>
		<hr style="margin: 5px 0 30px 0;" />
		<div class="row">
			<div class="col-xs-3">
				<ul class="person_center_nav">
					<li><a class="active">个人资料</a></li>
					<li><a href="orderForm.php">查看我的个人订单</a></li>
					<li><a href="shopcar.php">查看购物车</a></li>
					<li><a href="updatePro.php">发布闲置商品</a></li>
					<li><a href="contact_us.php">联系客服中心</a></li>
				</ul>
			</div>
			
			<!--上传头像模态框内容-->
					<div class="modal fade" tabindex="-1" id="setAva" data-backdrop="false" data-keyboard="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">编辑个人资料</div>
								<div class="modal-body">
									<form id="user_reg_form" action="../core/user.inc.php?act=edit&id=<?php echo $user['id']?>" method="post" class="modal-body form-inline" style="text-align: center;">
										<div class="reg-input-group">
											<label class="label-control">&nbsp;用&nbsp;户&nbsp;名&nbsp;：</label>
											<input name="username" type="text" class="form-control" placeholder="用户名" /><br/><br>
											
											<label>密&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;：&nbsp;</label>
											<input name="password" type="password" id="password" class="form-control" placeholder="请输入密码" /><br/><br>
											
											<label>确认密码：</label>
											<input name="repassword" type="password" class="form-control" placeholder="请再次输入密码" /><br/><br>
											
											<label>联系方式：</label>
											<input name="tel" type="text" class="form-control" placeholder="请输入您的联系方式" /><br/><br>
											
											<label>电子邮箱：</label>
											<input name="email" type="text" class="form-control" placeholder="请输入您的联系方式" /><br/><br>
											
											<label>Q&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;Q&nbsp;：&nbsp;</label>
											<input name="QQ" type="text" class="form-control" placeholder="请输入密码" /><br/><br>
										</div>
												<input type="radio" name="sex" value="1" checked="checked"/>男
												<input type="radio" name="sex" value="2" />女
												<input type="radio" name="sex" value="3" />保密<br><br>
											<input type="submit" value="立即更新" class="btn btn-primary" style="margin-right: 50px" />
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
								</div>
							</div>
						</div>
					</div>
			
			<div class="col-xs-9">
				<div class="portrait" style="text-align: center;">
						<img id="Avator" src="../avator/<?php if(isset($_COOKIE['adminName2'])){
						 if ($ava){
						 	echo $ava;
						 }else {echo 'avator.jpg';}
						}else {echo 'avator.jpg';}?>" alt="头像" />
				</div>
				<table class="personnal_information" style="margin: 0 auto;">
					<tr>
						<td>用户 ID：</td>
						<td><?php echo $user['id']?></td>
					</tr>
					<tr>
						<td>用户名：</td>
						<td><?php echo $user['username']?></td>
					</tr>
					<tr>
						<td>邮箱账号：</td>
						<td><?php echo $user['email']?></td>
					</tr>
					<tr>
						<td>联系方式：</td>
						<td><?php echo $user['tel']?></td>
					</tr>
					<tr>
						<td>注册时间：</td>
						<td><?php echo $user['regTime']?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><a data-toggle="modal" data-target="#setAva" class="btn btn-default">编辑修改</a></td>
					</tr>
				</table>
			</div>
		</div>
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
</body>
</html>
