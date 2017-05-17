<?php 
require_once '../include.php';
require_once '../core/pro.inc.php';
require_once '../lib/common.func.php';
if (!$_COOKIE['adminName2']){
	echo "<script> $(function(){
		$('.panel_box').css('display','none');
	}); </script>";
	alertErrorMes("请先登录", "login.php");
}else{
	$proid = $_REQUEST['keyword'];
	$pro = getProById($proid);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>商品介绍</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/cloud-zoom.css" />
		<link rel="stylesheet" href="css/shopcar-style.css" />
		<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
		<script type="text/javascript" src="js/shopcar.js" ></script>
		<script type="text/javascript" src="js/jquery.min.js" ></script>
		<script type="text/javascript" src="js/cloud-zoom.1.0.2.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
		<script type="text/javascript">
			//购物车
		    var cartTableTr = $('#cartTable > tbody > tr');
		    totalPrice(); 
		    $('.check').change(function(){
		    	totalPrice();
		    });
		    function totalPrice(){
				var totalprice = 0;
				for(var i=0;i<cartTableTr.length;i++){
					var price = parseFloat(cartTableTr.eq(i).children('td').eq(5).text());
					if(cartTableTr.eq(i).children('td').eq(0).find('input').is(':checked')){
			     		totalprice += price;
					}
			     }
				$('#totalprice').html(totalprice.toFixed(2));
			}
			
			$(function(){
				$('#sub_order').click(function(){

					var params = $("input").serialize();
					if(params.length<=80){
   						alert('请输入完整的订单信息');
						return false;
					}else{
						
						$.ajax({  
					    type: "post",  
					    url: "../core/pro.inc.php?act=subOrder&id=<?php echo $proid; ?>",  
		  			    dataType: "text",  
					    data: params,
					    success:function (){
// 					    	alert('yes');
					    	window.location="pay.php";
						},
						error:function (){
							alert("error");
						}  			    
				    });  
						
						
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
						<a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>购物车</a>
						<a href="portrait.php">个人中心</a>
						<a href="contact_us.php">联系我们</a>
					</div>
				</div>
			</div>
			<div class="header-menu">
			<div class="container">
				<div class="col-xs-2"><img alt="" src="img/logo2.png"></div>
				<ul class="pull-right shopcar_top">
					<li class="active">我的购物车</li>
					<li class="active">——> 填写核对订单</li>
					<li>——> 订单提交成功</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container personal_center" style="min-height: 600px;" >
		<div class="panel_box">
			<div class="panel_head">
				收货信息
			</div>
			<div class="panel_content">
				<table>
					<tr>
						<td><span>* </span>选择地区：</td>
						<td><select>
							<option value="成都">成都</option>
							<option value="北京">北京</option>
							<option value="上海">上海</option>
							<option value="香港">香港</option>
						</select></td>
					</tr>
					<tr>
						<td><span>* </span>详细地址：</td>
						<td><input type="text" name="full_address" placeholder="最多不超过26个字符" /></td>
					</tr>
					<tr>
						<td><span>* </span>收&nbsp; 货 &nbsp;人：</td>
						<td><input type="text" name="buyer" placeholder="最多不超过10个字符" /></td>
					</tr>
					<tr>
						<td><span>* </span>手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 机：</td>
						<td><input type="text" name="phone" placeholder="如137****9187" /></td>
						<td>&nbsp;或固定电话： </td>
						<td><input type="text" name="tel" placeholder="区号 - 电话号码" /></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="panel_box">
			<div class="panel_head">
				支付方式
			</div>
			<div class="panel_content2">
				<table>
					<tr>
						<td><input type="radio" checked="checked" name="pay_method" /> 微信支付 <img src="img/icon-weixin.png" alt="wechat" /></td>
						<td>用微信扫一扫就能支付<span class="active">（暂未开通）</span></td>
					</tr>
					<tr>
						<td><input type="radio" name="pay_method" /> 支付宝支付 <img src="img/icon-zhifubao.png" alt="wechat" /></td>
						<td>用支付宝支付<span class="active">（暂未开通）</span></td>
					</tr>
					<tr>
						<td><input type="radio" name="pay_method" /> 货到付款  </td>
						<td>送货上门后再付款</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="panel_box">
			<div class="panel_head">
				购货清单
			</div>
			<div class="panel_content_shopcar">
				<table class="table-bordered" id="cartTable">
					<thead>
						<tr>
							<td style="width: 5%;">编号</td>
							<td style="width: 25%;">商品名称</td>
							<td style="width: 25%;">商品详情</td>
							<td style="width: 10%;">价格</td>
							<td style="width: 10%;">数量</td>
							<td style="width: 20%;">小计</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php if ($pro){echo '<input class="check_one check" type="checkbox" checked="checked" />';}?>  <?php echo $pro['id']?></td>
							<td><?php if ($pro){
								$img=getByIdImg($proid);echo '<img src="../image_50/'.$img['albumPath'].'"/>';
							}?>  <br/><?php echo $pro['Pname']?></td>
							<td style="text-align: left;"><?php echo $pro['Pdesc']?></td>
							<td><?php echo $pro['iPrice']?></td>
							<td><?php if ($pro){echo '1';}?></td>
							<td><?php echo $pro['iPrice']?></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<table class="panel_footer table-bordered">
				<tr>
					<td style="width: 5%;min-width: 100px;text-align: center;"><input type="checkbox" class="check_all check" /> 全选</td>
					<td class="total_p">
						<span class="total_price pull-right">总计：<span id="totalprice"><?php echo $pro['iPrice']?></span></span><br />
						<button class="sub_order pull-right" id="sub_order">提交订单</button>
					</td>
				</tr>
			</table>
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
