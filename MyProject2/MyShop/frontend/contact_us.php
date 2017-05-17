<?php 
require_once '../include.php';
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
		<title>二狗网</title>
		<style type="text/css">
			.about-us-header{text-align: center;}
			.about-us-text{padding: 20px 150px;font-size: 15px;letter-spacing: 2px;}
			.about-us-text> p{text-indent: 34px;line-height: 25px;}
		</style>
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
						<a href="#">联系我们</a>
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
						<li><a class="active" href="#">联系我们</a></li>
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
			<div class="container" style="min-height:600px;padding: 30px;">
				<div class="about-us-header">
					<h3>基于PHP的高校旧货交易平台</h3>
				</div>
				<div class="about-us-text">
					<p>本系统就是为高校学生提供了一个二手物品交易的平台，方便每一位同学售卖自己的闲置物品，不再需要摆摊设点，能够节约出更多时间和精力；同时购买商品的同学也能享受到相当大的实惠，用最低的价格买到最实惠的商品。</p>
				<p>系统设计 9 个功能模块，分别是：前后台用户登录、注册、用户管理、商品分类管理、商品管理、密码修改、上传头像、商品购买、商品搜索等。系统开发使用PHP语言实现动态页面设计和交互功能，应用Bootstrap框架和jQuery插件，使用MySQL开发和管理数据库，对用户信息、商品信息、商品分类进行管理。系统界面友好美观。经系统测试，该系统功能完整，性能良好。</p>
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
		<div class="floatPanel">
			<div class="ctrlPanel">
				<a href="#top"><span class="glyphicon glyphicon-chevron-up"></span></a><hr />
				<a href="#"><span><img src="img/about.png" />关于</span></a><hr />
				<a><span style="font-size: 13px;"><img src="img/phone-icon.png" alt="" /><br />二维码</span></a><hr />
				<a href="#bottom"><span class="glyphicon glyphicon-chevron-down"></span></a>
			</div>
		</div>
		<div id="QRcode">
			<img src="img/wechat.png" alt="" />
		</div>
	</body>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>
</html>
