<div class="right-slide-head">
	<h2>修改密码</h2>
	<ul class="right-slide-nav">
		<li><span class="glyphicon glyphicon-home"></span><a href="index.php"> 首页 &nbsp;</a></li>
		<li class="active">修改密码&nbsp;</li>
	</ul><hr style="margin-bottom: 10px;" />
</div>
<form id="myform" action="../core/admin.inc.php?act=resetPassword" method="post">
	   <p>请输入原密码：</p>
	   <input type="password" name="password" class="form-control" placeholder="请输入原密码" /><br/>
	   <p>请输入新密码：</p>
	   <input type="password" name="pass" id="pass" class="required form-control" placeholder="请输入新的密码" /><br />
	   <p>再次确认密码：</p>
	   <input type="password" name="repass" class="required form-control" placeholder="再次确认密码" /><br/>
	   <button type="submit" class="btn"> 修改</button>
	   <button type="button" class="btn"> 取消</button>
</form>