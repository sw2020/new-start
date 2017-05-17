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
  </head>
  <body>
  	<div class="main-box text-center container">
  		<h3 ><span class="glyphicon glyphicon-cog"></span> 系统信息</h3>
  		<table class="table-bordered">
  			<tr>
  				<td>操作系统</td>
  				<td><?php echo PHP_OS;?></td>
  			</tr>
  			<tr>
  				<td>Apache版本</td>
  				<td><?php echo apache_get_version();?></td>
  			</tr>
  			<tr>
  				<td>PHP版本</td>
  				<td><?php echo PHP_VERSION ?></td>
  			</tr>
  		</table>
  		<h3><span class="glyphicon glyphicon-user"></span> 登录信息</h3>
  		<table class="table-bordered">
  			<tr>
  				<td>用户名</td>
  				<td><?php 
  				    date_default_timezone_set('PRC'); //设置中国时区 
					if(isset($_SESSION['adminName'])){
						echo $_SESSION['adminName'];
						}elseif(isset($_COOKIE['adminName'])){
						echo $_COOKIE['adminName'];
						}
  				?></td>
  			</tr>
  			<tr>
  				<td>当前登录时间</td>
  				<td><?php echo date('Y-m-d H:i:s',time()); ?></td>
  			</tr>
  			<tr>
  				<td>上次登录时间</td>
  				<td>2017.2.10</td>
  			</tr>
  			<tr>
  				<td>上次登录IP</td>
  				<td>202.115.0.1</td>
  			</tr>
  		</table>
  		
  	</div>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>  
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
