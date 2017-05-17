<?php
?>
<div class="header">
		<h3 class="pull-left">爱购-闲置物品交易平台</h3>
		<p class="pull-right">欢迎您，
			<?php 
  				    date_default_timezone_set('PRC'); //设置中国时区 
					if(isset($_SESSION['adminName'])){
						echo $_SESSION['adminName'];
					}elseif(isset($_COOKIE['adminName'])){
						echo $_COOKIE['adminName'];
					}
  				?>
		 &nbsp;   <a href="../core/admin.inc.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> 退出</a></p>
	</div>