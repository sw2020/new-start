<div class="right-slide-head">
	<h2>添加管理员</h2>
	<ul class="right-slide-nav">
		<li><span class="glyphicon glyphicon-home"></span> 首页 &nbsp;</li>
		<li><a href="listAdmin.php">管理员管理&nbsp;</a></li>
		<li >添加管理员&nbsp;</li>
	</ul><hr style="margin-bottom: 10px;" />
</div>
<form id="addAdmin_form" action="../core/admin.inc.php?act=addAdmin" method="post">
	<p>用户名：</p>
	<input type="text" name="username" placeholder="请输入用户名" class="form-control" style="max-width: 500px;margin: 8px 0 15px 0;" />
	<p>密    码：</p>
	<input type="password" name="password" placeholder="请输入密码" class="form-control" style="max-width: 500px;margin: 8px 0 15px 0;" />
	<p>电    话：</p>
	<input type="tel" name="tel" placeholder="请输入电话号码" class="form-control" style="max-width: 500px;margin: 8px 0 15px 0;" />
	<button type="submit" class="btn btn-primary"> 添加</button>
	<a href="listAdmin.php" class="btn btn-default"> 取消</a>
</form>