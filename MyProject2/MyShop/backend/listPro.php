<?php
require_once '../include.php';
require_once '../core/pro.inc.php';
require_once '../lib/common.func.php';
checkLogined();
$keyword = $_REQUEST["keyword"]?$_REQUEST["keyword"]:null;
$where =$keyword?"where Pname like '%{$keyword}%'":null;
$pageSize = 5;
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows = getRowsByPage($page,$pageSize, "shoppro",$where);
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
	<script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>  
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
  	<script>
  		$(function(){
			$('.navbar-slide').children('li').eq(2).addClass('active');
			$('.active > ul').css('display', 'block');

			$("#search_btn").click(function(){
				var val = $("#Pro_val").val();
				window.location="listPro.php?keyword="+val;
			});
			$("#reset_btn").click(function(){
				window.location="listPro.php";
			});
  	  	});

  		function addPro(){
  			window.location="addPro.php";	
  		}
  		function editPro(id){
  			window.location="editPro.php?id="+id;
  		}
  		function delPro(id){
  			window.location="../core/pro.inc.php?act=delPro&id="+id;
  		}
  	</script>
  <body>
	<?php require 'module/header.php';?>
	<div class="container-fluid">
		<div class="row">
			<div class="left-slide col-md-2 col-sm-2">
				<?php require 'module/nav.php';?>
			</div>
			<div class="right-slide col-md-10 col-sm-10 col-xs-12 pull-right">
				<div class="right-slide-head">
				<?php require 'module/listPro.php';?>
				</div>
			</div>
		</div>
	</div>
    
  </body>
</html>