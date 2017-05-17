<?php
require_once '../include.php';
checkLogined();
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>闲置物品交易平台</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css" />
 	<link rel="stylesheet" href="css/style2.css" />
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
		.about-us-header{text-align: center;}
		.about-us-text{padding: 30px 300px;font-size: 15px;letter-spacing: 2px;}
		.about-us-text> p{text-indent: 34px;line-height: 25px;}
	</style>
  </head>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>  
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
  <body>
	<?php require 'module/header.php';?>
	<div class="container-fluid">
		<div class="row">
			<div class="left-slide col-md-2 col-sm-2">
				<?php require 'module/nav.php';?>
			</div>
			<div class="right-slide col-md-10 col-sm-10 col-xs-12 pull-right" style="margin-top: 180px;">
				<div class="about-us-header">
					<h3>基于PHP的高校旧货交易平台</h3>
				</div>
				<div class="about-us-text">
					<p>本系统就是为高校学生提供了一个二手物品交易的平台，方便每一位同学售卖自己的闲置物品，不再需要摆摊设点，能够节约出更多时间和精力；同时购买商品的同学也能享受到相当大的实惠，用最低的价格买到最实惠的商品。</p>
				<p>系统设计 9 个功能模块，分别是：前后台用户登录、注册、用户管理、商品分类管理、商品管理、密码修改、上传头像、商品购买、商品搜索等。系统开发使用PHP语言实现动态页面设计和交互功能，应用Bootstrap框架和jQuery插件，使用MySQL开发和管理数据库，对用户信息、商品信息、商品分类进行管理。系统界面友好美观。经系统测试，该系统功能完整，性能良好。</p>
				</div>
			</div>
		</div>
	</div>
    
  </body>
</html>
