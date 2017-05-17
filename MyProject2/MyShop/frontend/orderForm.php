<?php 
require_once '../include.php';
require_once '../core/user.inc.php';
require_once '../core/pro.inc.php';
if (!$_COOKIE['adminName2']){
// 	alertMes("请先登录", "login.php");
	alertErrorMes("请先登录！", "login.php");
}
$where = $_COOKIE['adminName2'];
if (isset($where)){
	$ava = getUserByName($where)['face'];
}
$user = getUserByName($_COOKIE['adminName2']);
$promulgator = $user['id'];
$sql = "select * from shoppro where promulgator='F$promulgator'";
$rows = getAllPro($sql);
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
		<script>
				function editPro(id){
		  			window.location="editPro.php?id="+id;
		  		}
		  		function delPro(id){
		  			window.location="../core/pro.inc.php?act=frontend_delPro&id="+id;
		  		}
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
					<div class="col-xs-2"><img alt="" src="img/logo2.png"></div>
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
					<li><a href="portrait.php">个人资料</a></li>
					<li><a class="active">查看我的个人订单</a></li>
					<li><a href="shopcar.php">查看购物车</a></li>
					<li><a href="updatePro.php">发布闲置商品</a></li>
					<li><a href="contact_us.php">联系客服中心</a></li>
				</ul>
			</div>
			
					
			
			<div class="col-xs-9">
				<table class="table table-bordered">
		<thead>
			<tr>
					<th>商品编号</th>
					<th>商品名称</th>
					<th>售       价</th>
					<th>发布时间</th>
					<th>状       态</th>
					<th>操        作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($rows as $row):?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['Pname']; ?></td>
				<td><?php echo $row['mPrice']; ?></td>
				<td><?php echo $row['pubTime']; ?></td>
				<td><?php echo $row['state']?></td>
				<td>
				
					<div id="ordered" class="modal fade" data-backdrop="false" data-keyboard="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">订单详情</div>
								<div class="modal-body">
									<?php $order = getOrdered($row['Pname']);?>
										<p><label>订单号：</label><?php echo $order['id']?></p>
										<p><label>商品名称：</label><?php echo $order['proName']?></p>
										<p><label>商品价格：</label><?php echo $order['proPrice']?></p>
										<p><label>客户地址：</label><?php echo $order['full_address'] ?></p>
										<p><label>收货人：</label><?php echo  $order['buyer']?></p>
										<p><label>手机：</label><?php  echo $order['phone']?></p>
										<p><label>固定电话：</label><?php echo $order['tel']?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
								</div>
							</div>
						</div>
					</div>
					
					<div id="null_ordered" class="modal fade" data-backdrop="false" data-keyboard="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">订单详情</div>
								<div class="modal-body">
									<P>该商品尚未售出，没有相关订单信息。</P>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
								</div>
							</div>
						</div>
					</div>
					
					
					<a onclick="editPro(<?php echo  $row['id'];?>)">修改</a>
					<a onclick="delPro(<?php echo  $row['id'];?>)">删除</a>
					<a data-toggle="modal" <?php if ($order){echo 'data-target="#ordered"';}else {echo 'data-target="#null_ordered"';}?>>详情</a>
					
				</td>
			</tr>
			<?php endforeach; ?>
			
		</tbody>
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
