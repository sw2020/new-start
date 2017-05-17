<?php 
require_once '../include.php';
require_once '../core/user.inc.php';
require_once '../core/pro.inc.php';
$rows1 = getProByCateId(1);
$rows2 = getProByCateId(2);
//获取到头像
$where = $_COOKIE['adminName2'];
if (isset($where)){
	$ava = getUserByName($where)['face'];
}
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
		<link rel="stylesheet" href="css/zeroModal.css" />
		<title>二狗网</title>
	</head>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	<script type="text/javascript" src="js/zeroModal.min.js" ></script>
	<script type="text/javascript" src="js/main.js" ></script>
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
						<li><a class="active" href="#">首页</a></li>
						<li><a href="hotSales.php"><?php $where=1;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="hot_Reco.php"><?php $where=2;  $row=getOneCate($where); echo $row['cateName'];?></a></li>
						<li><a href="updatePro.php">发布闲置</a></li>
						<li><a href="contact_us.php">联系我们</a></li>
					</ul>
					<div class="input-group col-xs-3">
						<input type="text" name="" value="" class="form-control" id="search_all" placeholder="搜想要" />
						<div class="input-group-btn">
							<button class="btn btn-diy" id="search_btn" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
			<div class="container">
				<section class="row">
					
					<!--上传头像模态框内容-->
					<div class="modal fade" tabindex="-1" id="setAva" data-backdrop="false" data-keyboard="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">上传头像</div>
								<div class="modal-body">
									<form action="../core/user.inc.php?act=setAvator&user=<?php echo $_COOKIE['adminName2']?>" method="post" enctype="multipart/form-data">
						 				请选择上传文件：<input type="file" id="avafile" name="myFile"  /><br/> 
						 				<img src="" id="preview_avator" /><br />
						 				<button type="submit" class="btn btn-primary">上传</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
								</div>
							</div>
						</div>
					</div>
						
					<div class="col-md-3 col-lg-4 sec1-left"><!--显示个人信息 -->
						<div class="person_center">
							<a href="javascript:voild(0)"<?php if (isset($_COOKIE['adminName2'])){
								echo 'data-toggle="modal" data-target="#setAva"';
							}?> >上传头像</a>
							<img id="Avator" src="../avator/<?php if(isset($_COOKIE['adminName2'])){
						 if ($ava){
						 	echo $ava;
						 }else {echo 'avator.jpg';}
						}else {echo 'avator.jpg';}?>" alt="头像" />
							<p>Hi，你好！<a href="login.php"><?php if(isset($_COOKIE['adminName2'])){
						echo $_COOKIE['adminName2'];
						}else {echo '请先登录';}?></a></p>
							<p><a href="portrait.php">进入我的个人中心</a></p>
							<p><a href="orderForm.php">查看我的个人订单</a></p>
							<p><a href="updatePro.php">发布我的个人闲置</a></p>
						</div>					
					</div>
					<div class="col-md-9 col-lg-8 sec1-mid">
						<div id="carousel_1" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel_1" data-slide-to="0" class="active"></li>
								<li data-target="#carousel_1" data-slide-to="1"></li>
								<li data-target="#carousel_1" data-slide-to="2"></li>
							</ol>
							<!--轮播内容-->
							<div class="carousel-inner" role="item-list">
								<div class="item active">
									<img src="img/banner_01.jpg" alt="carousel1" />
									<div class="carousel-caption">
										
									</div>
								</div>
								<div class="item">
									<img src="img/banner_02.jpg" alt="carousel2" />
								</div>
								<div class="item">
									<img src="img/banner_01.jpg" alt="carousel3" />
								</div>
							</div>
							<!--左右按键-->
							<a class="left carousel-control" href="#carousel_1" role="button" data-slide="prev">								
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel_1" role="button" data-slide="next">								
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>									
				</section>
				
				<?php $where=1;  $cate=getOneCate($where);if ($rows1){
					echo '<hr /><br /> <div class="row sec">	
					<div class="col-md-2 col-lg-2 col-sm-4 col-xs-8">
						<h4><img src="img/shopIcon.jpg" alt="icon1" /> '.$cate["cateName"].'</h4>
					</div>
					<div class="col-md-offset-9 col-sm-offset-6 col-lg-offset-9 col-md-1 col-lg-1 col-sm-2 col-xs-4">
						<span><a href="hotSales.php">更多>></a></span>	
					</div>									
				</div>';
				}?>
				
				
				<section class="row">
					<?php foreach ($rows1 as $row):?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 sec3-col">
						<a href="pro/1.php?id=<?php echo $row['id']?>" class="thumbnail">
							<img src="../image_220/<?php $img=getByIdImg($row['id']);echo $img['albumPath'];?>" alt="#"/>
						</a>
						<h4><a href="pro/1.php?id=<?php echo $row['id']?>"><?php echo $row['Pname']?></a></h4>
						<p style='height: 60px'><a class='about_Pro' href="pro/1.php?id=<?php echo $row['id']?>"><?php echo $row['Pdesc']?></a></p>		
						<span class="sec3-price">￥<?php echo $row['iPrice']?>元</span>
						<a href="pro/1.php?id=<?php echo $row['id']?>"><span class="sec3-button pull-right">立即抢购</span></a>							
					</div>
					<?php endforeach;?>
				</section>
				
				
				
				<?php $where=2;  $row=getOneCate($where);if ($rows2){
					echo '<hr /><br /> <div class="row sec">	
					<div class="col-md-2 col-lg-2 col-sm-4 col-xs-8">
						<h4><img src="img/shopIcon.jpg" alt="icon1" /> '.$row["cateName"].'</h4>
					</div>
					<div class="col-md-offset-9 col-sm-offset-6 col-lg-offset-9 col-md-1 col-lg-1 col-sm-2 col-xs-4">
						<span><a href="hot_Reco.php">更多>></a></span>	
					</div>									
				</div>';
				}?>
				
				
				<section class="row">
					<?php foreach ($rows2 as $row):?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 sec3-col">
						<a href="pro/1.php?id=<?php echo $row['id']?>" class="thumbnail">
							<img src="../image_220/<?php $img=getByIdImg($row['id']);echo $img['albumPath'];?>" alt="#"/>
						</a>
						<h4><a href="pro/1.php?id=<?php echo $row['id']?>"><?php echo $row['Pname']?></a></h4>
						<p style='height: 60px'><a class='about_Pro' href="pro/1.php?id=<?php echo $row['id']?>"><?php echo $row['Pdesc']?></a></p>		
						<span class="sec3-price">￥<?php echo $row['iPrice']?>元</span>
						<a href="pro/1.php?id=<?php echo $row['id']?>"><span class="sec3-button pull-right">立即抢购</span></a>							
					</div>
					<?php endforeach;?>
				</section>
				
				
				
				<hr /><br />
				<div class="sec row">
					<div class="col-md-2 col-lg-2 col-sm-4 col-xs-8">
						<h4><img src="img/shopIcon.jpg" alt="icon1" /> <?php $where=3;  $row=getOneCate($where); echo $row['cateName'];?></h4>
					</div>
					<div class="col-md-offset-9 col-sm-offset-6 col-lg-offset-9 col-md-1 col-lg-1 col-sm-2 col-xs-4">
						<span><a href="digital_pro.php">更多>></a></span>	
					</div>														
				</div>
				
				<section class="row">
					<ul id="mytabs" class="nav nav-stacked col-md-2 col-xs-2  col-sm-2" role="tablist">
						<li role="presentation" class="active"><a href="#phone" role="tab" data-toggle="tab">手机</a></li>
						<li role="presentation"><a href="#pc" role="tab" data-toggle="tab">电脑</a></li>
						<li role="presentation"><a href="#camra" role="tab" data-toggle="tab">数码相机</a></li>
						<li role="presentation"><a href="#pad" role="tab" data-toggle="tab">平板</a></li>
						<li role="presentation"><a href="#other" role="tab" data-toggle="tab">其他</a></li>
					</ul>
					<div class="tab-content col-md-offset-2 col-md-8 col-xs-offset-2 col-xs-8 col-sm-offset-2 col-sm-8">
						<div id="phone" class="active tab-pane">
							<a href="digital_pro.php"><img src="img/tab1.jpg" alt="phone" /></a>
							<div class="tab-words">
								<h3><a href="digital_pro.php">进入专区</a></h3>
								<p>点击进入二手手机专区，淘到你称心如意的商品。</p>
							</div>
						</div>
						<div id="pc" class="tab-pane">
							<a href="digital_pro.php"><img src="img/tab2.jpg" alt="pc" /></a>
							<div class="tab-words">
								<h3><a href="digital_pro.php">淘电脑</a></h3>
								<p>点击进入二手电脑专区，实惠商品带回家。</p>
							</div>
						</div>
						<div id="camra" class="tab-pane">
							<a href="digital_pro.php"><img src="img/tab3.jpg" alt="camra" height="450px"/></a>
						</div>
						<div id="pad" class="tab-pane">
							<a href="digital_pro.php"><img src="img/tab4.jpg" alt="pad" height="450px" /></a>
						</div>
						<div id="other" class="tab-pane">
							<a href="digital_pro.php"><img src="img/tab5.jpg" alt="other" /></a>
						</div>
					</div>
				</section>
				<hr /><br />
				<div class="sec row">
					<div class="col-md-2 col-lg-2 col-sm-4 col-xs-8">
						<h4><img src="img/shopIcon.jpg" alt="icon1" /> <?php $where=4;  $row=getOneCate($where); echo $row['cateName'];?></h4>
					</div>
					<div class="col-md-offset-9 col-sm-offset-6 col-lg-offset-9 col-md-1 col-lg-1 col-sm-2 col-xs-4">
						<span><a href="sports.php">更多>></a></span>	
					</div>														
				</div>				
				<section class="row">
					<div class="col-md-2 col-xs-2  col-sm-2">
						<div id="menu" class="menu">
							<ul id="sec-menu" class="nav nav-pills nav-stacked">
								<li><a href="#bike">自行车</a></li>
								<li><a href="#ball">球类器材</a></li>
								<li><a href="#fitness">健身器材</a></li>
								<li><a href="#skate">滑冰鞋</a></li>
								<li><a href="#other-sport">其他</a></li>
							</ul>
							<div id="bike" class="menu-box">
								<h4 class="pull-left active">出售</h4><br/>
								<ul>
									<li><a href="">山地自行车</a></li>
									<li><a href="">死飞</a></li>
									<li><a href="">折叠车</a></li>
									<li><a href="">城市单车</a></li>
									<li><a href="">公路车</a></li>
								</ul>
								<hr style="width: 85%" />
								
								<ul>
									<li><a href="">自行车配件</a></li>
									<li><a href="">骑手装备</a></li>
								</ul>
								<hr style="width: 85%" />
								<br />
								<h4 class="pull-left active">出租</h4><br/>
								<ul>
									<li><a href="">山地自行车</a></li>
									<li><a href="">死飞</a></li>
									<li><a href="">折叠车</a></li>
									<li><a href="">城市单车</a></li>
									<li><a href="">公路车</a></li>
								</ul>
								<hr style="width: 85%" />
								
								<ul>
									<li><a href="">双人双排车</a></li>
									<li><a href="">双人单排车</a></li>
									<li><a href="">四人双排车</a></li>
									<li><a href="">电瓶车</a></li>
								</ul>
								<hr style="width: 85%" />
								<img src="img/bike_01.jpg"/>
							</div>
							<div id="ball" class="menu-box">
								<h4 class="pull-left active">球类器具</h4><br/>
								<ul>
									<li><a href="">足球</a></li>
									<li><a href="">篮球</a></li>
									<li><a href="">乒乓球</a></li>
									<li><a href="">羽毛球</a></li>
									<li><a href="">排球</a></li>
									<li><a href="">棒球</a></li>
								</ul>
								<hr style="width: 85%" />
								<br />
								<h4 class="pull-left active">球类配件</h4><br/>
								<ul>
									<li><a href="">篮球鞋</a></li>
									<li><a href="">球服</a></li>
									<li><a href="">足球鞋</a></li>
									<li><a href="">护手</a></li>
									<li><a href="">其他更多</a></li>
								</ul>
								<hr style="width: 85%" />
								<ul>
									<li><a href="">篮球鞋</a></li>
									<li><a href="">护手</a></li>
									<li><a href="">更多</a></li>
								</ul>
								<hr style="width: 85%" />
								<img src="img/ball_01.png"/>
							</div>
							<div id="fitness" class="menu-box">
								<h4 class="pull-left active">健身器具</h4><br/>
								<ul>
									<li><a href="">哑铃</a></li>
									<li><a href="">负重沙袋</a></li>
									<li><a href="">呼啦圈</a></li>
									<li><a href="">臂力器</a></li>
									<li><a href="">腕力器</a></li>
									<li><a href="">跳绳</a></li>
								</ul>
								<hr style="width: 85%" />
								<ul>
									<li><a href="">瑜伽垫</a></li>
									<li><a href="">其他</a></li>
								</ul>
								<hr style="width: 85%" />
								<br />
								<h4 class="pull-left active">健身配件</h4><br/>
								<ul>
									<li><a href="">跑鞋</a></li>
									<li><a href="">护腕</a></li>
									<li><a href="">臂包（跑步专用）</a></li>
									<li><a href="">户外水壶</a></li>
									<li><a href="">其他更多</a></li>
								</ul>
								<hr style="width: 85%" />
								<img src="img/fitness_01.png"/>
							</div>
							<div id="skate" class="menu-box">
								<h4 class="pull-left active">轮滑鞋</h4><br/>
								<ul>
									<li><a href="">米高</a></li>
									<li><a href="">乐秀（ROADSHOW）</a></li>
									<li><a href="">美洲狮</a></li>
									<li><a href="">力星</a></li>
									<li><a href="">迈卡龙</a></li>
								</ul>
								<hr style="width: 85%" />
								<br />
								<h4 class="pull-left active">轮滑鞋配件</h4><br/>
								<ul>
									<li><a href="">普通轮子</a></li>
									<li><a href="">荧光轮</a></li>
									<li><a href="">户外背包</a></li>
									<li><a href="">轴承</a></li>
									<li><a href="">其他更多</a></li>
								</ul>
								<hr style="width: 85%" />
								<img src="img/skate_01.png"/>
							</div>
							<div id="other-sport" class="menu-box">
								<h4 class="pull-left active">其他户外运动商品</h4><br/>
								<ul>
									<li><a href="">运动背包</a></li>
									<li><a href="">运动鞋</a></li>
									<li><a href="">其他1</a></li>
									<li><a href="">其他2</a></li>
									<li><a href="">其他3</a></li>
								</ul>
								<hr style="width: 85%" />
								<ul>
									<li><a href="">其他4</a></li>
									<li><a href="">其他5</a></li>
									<li><a href="">其他6</a></li>
									<li><a href="">其他7</a></li>
									<li><a href="">其他8</a></li>
									<li><a href="">更多</a></li>
								</ul>
								<hr style="width: 85%" />
								<ul>
									<li><a href="">其他4</a></li>
									<li><a href="">其他5</a></li>
									<li><a href="">其他6</a></li>
									<li><a href="">其他7</a></li>
									<li><a href="">其他8</a></li>
									<li><a href="">更多</a></li>
								</ul>
								<hr style="width: 85%" />
								<img src="img/other_sport.png"/>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-xs-10 col-sm-10" style="border: 2px solid #E3E3E3;height: 500px;">	
						<div class="sport-panel">
							<h2>运动器材热销</h2>	
							<p>运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销运动器材热销</p>
							<span><a href="sports.php" class="btn btn-primary">点击了解更多</a></span>
						</div>
					</div>
				</section>
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
