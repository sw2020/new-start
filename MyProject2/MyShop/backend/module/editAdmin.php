<div class="right-slide-head">
	<h2>修改管理员信息</h2>
	<ul class="right-slide-nav">
		<li><span class="glyphicon glyphicon-home"></span><a href='index.php'>首页 &nbsp;</a> </li>
		<li><a href='listAdmin.php'>管理员管理&nbsp;</a></li>
		<li class="active">修改管理员信息&nbsp;</li>
	</ul><hr style="margin-bottom: 10px;" />
</div>
<form id="editAdmin_form" action="../core/admin.inc.php?act=editAdmin&id=<?php echo $id;?>" method="post">
	<p>用户名：</p>
	<input type="text" name="username" placeholder="<?php echo $row['username'];?>" class="form-control" style="max-width: 500px;margin: 8px 0 15px 0;" />
	<p>密    码：</p>
	<input type="password" name="password" placeholder="<?php echo '请输入新的密码'?>" class="form-control" style="max-width: 500px;margin: 8px 0 15px 0;" />
	<p>电    话：</p>
	<input type="tel" name="tel" placeholder="<?php echo $row['tel'];?>" class="form-control" style="max-width: 500px;margin: 8px 0 15px 0;" />
	<button type="submit" class="btn btn-primary"> 更新</button>
	<a href="listAdmin.php" class="btn btn-default"> 取消</a>
</form>