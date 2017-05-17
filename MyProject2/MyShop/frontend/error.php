<!doctype html>
<html lang="zh-cmn-Hans">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">

<script type="text/javascript" src="js/jquery-1.11.1.js" ></script>
<style>
	.color-red{
		color: red;
	}
	.error-404 img {
		width: 100%;
		margin-bottom: 20px;
		margin-top: -10px;
	}
	.error-404 {
		text-align: center;
		width: 500px;
		margin: 50px auto;		
		padding-bottom: 60px;
	}
	
	.error-404 h3,
	.error-404 p {
		text-align: left;
	}
</style>
<title>支付时间超时</title>
</head>

<body>
	<body>
		<div class="container error-404">
			<h3>对不起，您的支付时间超时.....</h3>
			<p><span id="last_10" class="color-red">10 </span> 秒后自动返回首页</p>
			<img src="img/404.png" alt="404"/><br />
			<a href="index.php">返回首页</a>
		</div>
			
		<script>
			var i = 10;
			$('#last_10').html(i);
			function minus(){
				i--;
				$('#last_10').html(i);
				if(i==0){
					window.location='index.php';
				}
			}
			setInterval(minus,1000);
		</script>
	</body>
</html>
