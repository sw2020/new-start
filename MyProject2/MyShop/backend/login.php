<?php 
require_once '../include.php';
$_SESSION=array();
if (isset($_COOKIE['adminId'])){
	setcookie('adminId',"",time()-7*24*3600);
}
if (isset($_COOKIE['adminName'])){
	setcookie("adminName","",time()-7*24*3600);
}
session_destroy();
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
  </head>
  <body>
  	<div class="head">
  		<h1>爱购校园闲置物品交易平台</h1>
  	</div>
  	<div style="background: url(img/timg.jpg) no-repeat;overflow: hidden;height: 875px;"></div>
    <div class="login-panel"></div>
		<form class="form-horizontal login-form" method="post" action="doLogin.php" role="form">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-5 control-label">用户名</label>
			    <div class="col-sm-5 col-md-4">
			      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="username">
			    </div>
			  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-5 control-label">密 &nbsp;&nbsp;码</label>
		    <div class="col-sm-5 col-md-4">
		      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-5 control-label">验证码</label>
		    <div class="col-sm-5 col-md-4 verify input-group">
		      <input type="text" name="verify" id="" value="" />
		      <img src="getVerify.php" onclick="this.src='getVerify.php?nocache='+Math.random()" />
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-5 col-sm-2">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox" checked="checked" name="autoFlag" value="1"> 自动登录（一周之内自动登录）
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-5 col-sm-2">
		      <button type="submit" class="btn btn-default">登 &nbsp;录</button>
		    </div>
		  </div>
			</form>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>  
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
