<?php 
require_once '../include.php';
require_once '../core/pro.inc.php';
$pros = getProByCateId(1);
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
					<div class="col-xs-2"><img alt="" src="../frontend/img/logo2.png"></div>
					<ul class="col-xs-7">
						<li><a href="index.php">首页</a></li>
						<li><a class="active" href="#"><?php $where=1;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="hot_Reco.php"><?php $where=2;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="updatePro.php">发布闲置</a></li>
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
	<div class="container" style="min-height:600px">
		<div class="up-position">
			<ul>
				<li><span class="glyphicon glyphicon-home"></span><a href="index.php"> 首页 &nbsp;</a> </li>
				<li>特卖专区</li>
			</ul>
		</div>
		
		<div class="row sales_panel">
		<?php foreach ($pros as $pro):?>
			<div class="col-sm-3 sale_panel">
				<a href="pro/1.php?id=<?php echo $pro['id']?>" class="thumbnail">
					<img src="../image_220/<?php $id = $pro['id'] ;$img=getByIdImg($id);echo $img['albumPath']?>" alt="#"/>
				</a>
				<h4><a href="pro/1.php?id=<?php echo $pro['id']?>"><?php echo $pro['Pname']?></a></h4>
				<p><a class='about_Pro' href="pro/1.php?id=<?php echo $pro['id']?>"><?php echo $pro['Pdesc']?></a></p>
				<div class="price_buy">
					<span class="sec3-price">￥<?php echo $pro['iPrice']?></span>
					<a href="pro/1.php?id=<?php echo $pro['id']?>"><span class="sec3-button pull-right">立即抢购</span></a>						
				</div>		
			</div>
		<?php endforeach;?>
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
