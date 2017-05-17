<?php 
require_once '../include.php';
if (isset($_COOKIE['adminName2'])){
	setcookie("adminName2","",time()-7*24*3600);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-1.11.1.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="js/jquery.validate.js" ></script>
		<script type="text/javascript" src="js/main.js" ></script>
		<script>
			$(function(){
				//前台表单验证
				$('#user_log_form1').validate({
					rules: {
						username: "required",
						password: {
							required:true,
							rangelength:[6,16]
						}
					},
					messages: {
						username: '请输入用户名',
						password: {
							required:'请输入密码',
							rangelength:'请输入6-16位字符串密码'
						}
					}
				});
				
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
		<title>用户登录</title>
	</head>
	<body>
		<div class="login-top">
			<div class="container">
				<h1>高校旧货交易平台</h1>
				<a href="index.php"><span class="glyphicon glyphicon-shopping-cart"></span> *进入首页</a>
			</div>
		</div>
		<div class="login-midlle container">
			<div class="row">
				<div class="middle-left col-md-7">
					<div class="box0">
						<img src="img/login.png" width="50%" height="40%" alt="购物车" />
					    <h3 class="login-font">旧货易购，大学生自己的交易平台</h3>
					    <h4 class="login-font">快将你的闲置物品分享出来吧</h5>
					</div>    	
				</div>
				<div class="middle-right col-md-5">
					<div class="box1">
						<!--<h3>用户登录</h3>-->
						<form class="form-horizontal form-group" id="user_log_form1" name="myForm" action="dologin.php" method="post">
							<!--<div class="input-group">-->
								<!--<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>-->
								<input class="form-control" type="text" name="username" placeholder="请输入用户名" style="height: 40px;" />
							<!--</div>-->															
							<!--<div class="input-group">-->
								<!--<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>-->
								<input class="form-control" type="password" name="password" placeholder="请输入密码" style="height: 40px;" />
							<!--</div>-->							
						    <br/><label>验证码</label>&nbsp;
						    <input type="text" name="verify" id="" value="" style="height: 25px;width:75px" />
						    <img src="../backend/getVerify.php" onclick="this.src='../backend/getVerify.php?nocache='+Math.random()" style="height:25px;margin-top:-3px" />
						    
							<div class="checkbox pull-right">
								<label style="margin-right: 40px;">
<!-- 									  <input type="checkbox" checked="checked" name="autoFlag" value="1"> 自动登录（一周之内自动登录） -->
								</label>
							</div>
							<div class="box1-btn">								
								<button class="btn btn-2" type="submit">登 录</button>
							</div>
							<div class="box3 pull-right">
								<a data-toggle="modal" data-target="#myModal2" type="button">免费注册</a>
								<a href="zhuce.html">找回密码</a>
								<a href="../backend/login.php">管理员入口</a>
							</div>
						</form>			
					</div>																	
				</div>
			</div>	
		</div>
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2 style="text-align: center;">注册</h2>
					</div>
					<form id="user_reg_form" action="../core/user.inc.php?act=reg" method="post" class="modal-body form-inline" style="text-align: center;">
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
							<input type="checkbox" name='regFlag' value="1" />我已阅读并同意相关声明<br /><br />
							<input type="submit" value="立即注册" class="btn btn-primary" style="margin-right: 50px" />
						
					</form>
					
				</div>
			</div>
		</div>
		<div class="login-footer">
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
