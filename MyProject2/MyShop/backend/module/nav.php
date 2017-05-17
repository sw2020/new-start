<?php
?>
  <script type="text/javascript">
    	$(function(){
    		$('.navbar-slide > li').on('click', function() {
    				$liObj = $('.navbar-slide > li');
						$(this).toggleClass('active');
						$liObj.find('ul').css('display', 'none');					
						$('.active > ul').css('display', 'block');
						//debugger;
						if($(this).hasClass('active')){
							$('.navbar-slide > li.active .gly-icon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
						}else{
							$('.navbar-slide > li:not(.active) .gly-icon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
						}
			 	});
			 	
			 	
    	})
    </script>
<ul class="nav navbar-slide">
					<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> &nbsp;首 页</a></li>												
					
					<li>
						<a href="listCate.php"><span class="glyphicon glyphicon-list"></span> &nbsp;分类管理<span class="gly-icon glyphicon glyphicon-chevron-down pull-right"></span></a>
						<ul>
							<li><a href="addCate.php">增加分类</a></li>
							<li><a href="listCate.php">查看列表</a></li>
						</ul>
					</li>
					
					<li>
						<a href="listPro.php"><span class="glyphicon glyphicon-shopping-cart"></span> &nbsp;商品管理<span class="gly-icon glyphicon glyphicon-chevron-down pull-right"></span></a>
						<ul>
							<li><a href="addPro.php">商品添加</a></li>
							<li><a href="listPro.php">查看列表</a></li>
						</ul>
					</li>
					
					<li>
						<a href="listAdmin.php"><span class="glyphicon glyphicon-cog"></span> &nbsp;管理员管理 <span class="gly-icon glyphicon glyphicon-chevron-down pull-right"></span></a>
						<ul>
							<li><a href="addAdmin.php">添加管理员</a></li>
							<li><a href="listAdmin.php">查看管理员列表</a></li>
						</ul>
					</li>
					
					<li><a href="listUser.php"><span class="glyphicon glyphicon-user"></span> &nbsp;查看用户列表</a></li>
					<li><a href="resetPassword.php"><span class="glyphicon glyphicon-lock"></span> &nbsp;修改密码</a></li>
					<li><a href="about_us.php"><span class="glyphicon glyphicon-edit"></span> &nbsp;关于我们</a></li>
				</ul>