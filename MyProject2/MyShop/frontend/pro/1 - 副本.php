<?php 
require_once '../../include.php';
require_once '../../core/user.inc.php';
include_once '../../core/pro.inc.php';
$pro = getProById(1);
$sql="select * from commonuser where username='{$pro["promulgator"]}'";
$user = getUser($sql);
$id=$_REQUEST[id];
echo $id;
// $img = getAllImgByProId($id);
// echo $img[1]['albumPath'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品介绍</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/cloud-zoom.css" />
		<link rel="stylesheet" href="../css/shopcar-style.css" />
		<script type="text/javascript" src="../js/jquery.min.js" ></script>
		<script type="text/javascript" src="../js/cloud-zoom.1.0.2.js" ></script>
		<script type="text/javascript" src="../js/jquery-3.1.1.min.js" ></script>
		<script type="text/javascript" src="../js/shopcar.js" ></script>
		<script type="text/javascript" src="../js/bootstrap.min.js" ></script>
		<script type="text/javascript" src="../js/main.js" ></script>
	</head>
	<body>
		<div class="header" id="top">
			<div class="header-top">
				<div class="container">
					<a href="#">免费注册</a>
					<?php 
					if (!$_COOKIE['adminName2']){
						echo '<a href="../login.php">您好，请登录</a>';
					}else {
						echo '<a href="../login.php">注销</a>';
					}
					?>
					
					<div class="pull-right">
						<a href="../shopcar.php"><span class="glyphicon glyphicon-shopping-cart"></span>购物车</a>
						<a href="../portrait.php">个人中心</a>
						<a href="../contact_us.php">联系我们</a>
					</div>
				</div>
			</div>
			<div class="header-menu">
				<div class="container">
					<div class="header-brand col-xs-2"><h2>咸鱼</h2></div>
					<ul class="col-xs-7">
						<li><a href="../index.php">首页</a></li>
						<li><a class="active" href="../hotSales.php"><?php $where=1;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="../hot_Reco.php"><?php $where=3;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="../updatePro.php">发布闲置</a></li>
						<li><a href="../contact_us.php">联系我们</a></li>
					</ul>
					<div class="input-group col-xs-3">
						<input type="text" name="" value="" class="form-control" id="search_all" placeholder="搜想要" />
						<div class="input-group-btn">
							<button class="btn btn-diy" id="search_btn2" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="container" style="height: 600px;">
		<div class="up-position">
			<ul>
				<li><span class="glyphicon glyphicon-home"></span> 首页 &nbsp;</li>
				<li><a href="../frontend/hotSales.php">热卖专区&nbsp;</a></li>
				<li>iPad&nbsp;</li>
			</ul>
		</div>
	<div class="product-detail">
		<div class="product-left-aera col-md-4">
			<div class="big-img">
				<a href='../img/pro/des_big.jpg' class = 'cloud-zoom' id='zoom1' rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4">
      				<img src="../img/pro/des_big.jpg" alt=''/>
      			</a>
			</div>
			<div class="small-img">
				<a href='../img/pro/des_bigger.png' class='cloud-zoom-gallery active' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '../img/pro/des_big.jpg' "> <img src="../img/pro/des_sm.jpg" alt = ""/></a> 
				<a href='../img/pro/ipad2-big.png' class='cloud-zoom-gallery' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '../img/pro/ipad2.png' "> <img src="../img/pro/ipad2-sm.png" alt = ""/></a> 
				<a href='../img/pro/ipad3.jpg' class='cloud-zoom-gallery' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '../img/pro/ipad3.png' "> <img src="../img/pro/ipad3-sm.png" alt = ""/></a> 
				<a href='../img/pro/bigipad.jpg' class='cloud-zoom-gallery' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '../img/pro/bigipad.png' "> <img src="../img/pro/bigipad-sm.png" alt = ""/></a> 
				<a href='../img/pro/ipad4.png' class='cloud-zoom-gallery' title='Thumbnail 1' rel="useZoom: 'zoom1', smallImage: '../img/pro/ipad4-md.png' "> <img src="../img/pro/ipad4-sm.png" alt = ""/></a> 
			</div>
		</div>
		<div class="product-right-aera col-md-8">
			<h4><?php echo $pro['Pdesc']?></h4>
			<p>转卖价： ￥<span> <?php echo $pro['iPrice']?></span>元</p>
			<hr />
			<div class="details">
				<p>成色： <?php echo $pro['NewOrOld']?></p>
				<p>所在地： <?php echo $pro['address']?></p>
				<p>联系方式：
					<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $user['QQ']?>&site=qq&menu=yes"><span class="glyphicon glyphicon-comment"></span> 与我联系</a>
				</p>
				<p>交易方式： <select>
					<option value="1">现场交易</option>
					<option value="2">在线交易</option>
				</select></p>
				<p>状态： <span style="color: red;"><?php echo $pro['state']?></span></p>
				<button id="buy_now" class="details-buy">立即购买</button><input id="proid" type="text" value="<?php echo $pro['id']?>" style="display: none" />
				<button class="details-buy add-button" data-price="<?php echo $pro['iPrice']?>" data-proname="iPad Air2 16G" data-proimg="img/pro/des_big.jpg"><span class="glyphicon glyphicon-shopping-cart"></span> 加入购物车</button>
			</div>	
		</div>
		
		<div class="cd-cart-container empty">
			<a href="#0" class="cd-cart-trigger">
				购物车
				<ul class="count"> <!-- cart items count -->
					<li>0</li>
					<li>0</li>
				</ul> <!-- .count -->
			</a>
		
			<div class="cd-cart">
				<div class="wrapper">
					<header>
						<h2>购物车</h2>
						<span class="undo">已删除</span>
					</header>
					
					<div class="body">
						<ul>
							<!-- products added to the cart will be inserted here using JavaScript -->
						</ul>
					</div>
		
					<footer>
						<a href="../shopcar.php" class="checkout"><em>结算 - ￥<span>0</span></em></a>
					</footer>
				</div>
			</div> <!-- .cd-cart -->
		</div>
	</div>
	</div>
	<div class="login-footer" id="bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<img src="../img/wechat.png" width="120px" height="120px" alt="wechat" />
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
	<script>
		$(function(){
			$('.small-img a').click(function(){
				$('.small-img a').removeClass('active');
				$(this).addClass('active');
			});
		});
	</script>
</body>
</html>
