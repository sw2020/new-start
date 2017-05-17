<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			.main-box{
				width: 300px;
				margin: 80px auto;
			}
			.main-box img{
				margin-left: 15px;
			}
			.color-red{
				color: red;
			}
		</style>
		<script type="text/javascript" src="js/jquery-1.11.1.js" ></script>
		<script>
			var M=900;
			var minus = Math.floor(M/60);
			var s = M%60;
			$('#time').html(minus+'分'+s+'秒');
			function timer(){
				M--;
				minus = Math.floor(M/60);s = M%60;
				$("#time").html(minus+'分'+s+'秒');
				if(s==0){
					window.location="error.php";
				}
			}
			setInterval(timer,1000);
			
			
			
		</script>
	</head>
	<body>
		<div class="main-box">
			<img src="img/wechat.png" />
			<p>请在 <span id="time" class="color-red">15分钟</span> 内，完成微信支付。</p>
		</div>
	</body>
</html>
